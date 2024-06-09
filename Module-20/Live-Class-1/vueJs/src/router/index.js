import { createRouter, createWebHistory } from 'vue-router';
import { authStore } from '../store/store';
import showAlert from '../helpers/alert';

import Register from '../views/auth/Register.vue';
import Login from '../views/auth/Login.vue';
import Home from '../views/Home.vue';

import Dashboard from '../views/frontend/Dashboard.vue';
import AdminDashboard from '../views/admin/Dashboard.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/register', component: Register },
    { path: '/login', component: Login },
    { path: '/dashboard', component: Dashboard, meta: { requiresAuth: true, role: 'customer' } },
    { path: '/admin/dashboard', component: AdminDashboard, meta: { requiresAuth: true, role: 'admin' } }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    const { requiresAuth, role } = to.meta;
    const isAuthenticated = authStore.isAuthenticated;
    const userRole = authStore.getUserRole();

    if (requiresAuth) {
        if (!isAuthenticated) {
            showAlert('error', 'You need to login to access this page.');
            next('/login');
        } else if (role !== userRole) {
            showAlert('error', 'You are not authorized to access this page.');
            next(userRole === 'admin' ? '/admin/dashboard' : '/');
        } else {
            next();
        }
    } else if (to.path === '/login' && isAuthenticated) {
        showAlert('error', 'You are already logged in.');
        next(userRole === 'admin' ? '/admin/dashboard' : '/dashboard');
    } else {
        next();
    }
});

export default router;

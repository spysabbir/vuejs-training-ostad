import { createWebHistory, createRouter } from 'vue-router'
import { fn } from "../data/data";

import HomeView from '../views/Home.vue'
import AboutView from '../views/About.vue'
import UserView from '../views/User.vue'
import DashboardView from '../views/user/Dashboard.vue'
import LoginView from '../views/user/Login.vue'
import RegisterView from '../views/user/Register.vue'

const routes = [
    { 
        path: '/',
        name: 'Home',
        component: HomeView,
    },
    { 
        path: '/about',
        name: 'About',
        component: AboutView,
    },
    { 
        path: '/register',
        name: 'Register',
        component: RegisterView,
        meta: { requiresGuest: true }
    },
    { 
        path: '/login',
        name: 'Login',
        component: LoginView,
        meta: { requiresGuest: true }
    },
    { 
        path: '/user',
        name: 'User',
        component: UserView,
        meta: { requiresAuth: true },
        children: [
            { 
                path: '',
                name: 'Dashboard',
                component: DashboardView,
            },
        ]
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    const requiresGuest = to.matched.some(record => record.meta.requiresGuest);
    const authData = fn.getAuthStorage();
    const isAuthenticated = authData != undefined && authData != null && authData != "";

    if (requiresAuth && !isAuthenticated) {
        next("/login");
    } else if (requiresGuest && isAuthenticated) {
        next("/user");
    } else {
        next();
    }
});

export default router

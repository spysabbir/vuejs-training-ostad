import { createRouter, createWebHashHistory } from 'vue-router';
import Welcome from './components/Welcome.vue';
import Settings from './components/Settings.vue';

const routes = [
    {
        path: '/',
        component: Welcome
    },
    {
        path: '/settings',
        component: Settings
    },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

export default router;
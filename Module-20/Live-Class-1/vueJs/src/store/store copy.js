import { reactive } from 'vue'
import router from '../router'
// import { purchase } from './purchase'
// import { sale } from './sale'
import showAlert from './../helpers/alert';

const authStore = reactive({

    apiBase: 'http://localhost:8000/api/',

    isAuthenticated: localStorage.getItem('auth') === 'true',
    user: JSON.parse(localStorage.getItem('user') || '{}'),
    defaultSettings: JSON.parse(localStorage.getItem('defaultSettings') || '{}'),
    errors: null,

    async fetchPublicApi(endPoint = "", params = {}, requestType = "GET") {
        let request = {
            method: requestType.toUpperCase(),
            headers: {
                "Access-Control-Allow-Origin": "*",
                Accept: "application/vnd.api+json",
                "Content-Type": "application/vnd.api+json",
            },
        };

        if (requestType.toUpperCase() === "POST" || requestType.toUpperCase() === "PUT") {
            request.body = JSON.stringify(params);
        }

        const res = await fetch(authStore.apiBase + endPoint, request);
        const response = await res.json();
        return response;
    },

    async fetchProtectedApi(endPoint = "", params = {}, requestType = "GET") {
        const token = authStore.getUserToken();
        let request = {
            method: requestType.toUpperCase(),
            headers: {
                "Access-Control-Allow-Origin": "*",
                Accept: "application/vnd.api+json",
                "Content-Type": "application/vnd.api+json",
                'Authorization': `Bearer ${token}`,
            },
        };

        if (requestType.toUpperCase() === "POST" || requestType.toUpperCase() === "PUT") {
            request.body = JSON.stringify(params);
        }

        const res = await fetch(authStore.apiBase + endPoint, request);
        const response = await res.json();
        return response;
    },

    async register(name, email, password, confirm_password) {
        try {
            const res = await authStore.fetchPublicApi('register', { name, email, password, confirm_password }, 'POST');
            if (!res.success) {
                showAlert('error', res.message || 'Failed to register user.');
                authStore.errors = res.errors;
                return;
            }
            authStore.errors = null;
            showAlert('success', res.message || 'User registered successfully.');
            router.push('/login');
        } catch (err) {
            showAlert('error', err.message || 'Failed to register user.');
        }
    },

    async login(email, password) {
        try {
            const res = await authStore.fetchPublicApi('login', { email, password }, 'POST');
            if (!res.success) {
                showAlert('error', res.message || 'Failed to authenticate user.');
                return;
            }
            authStore.isAuthenticated = true;
            authStore.user = res.data;
            localStorage.setItem('auth', 'true');
            localStorage.setItem('user', JSON.stringify(res.data));

            // await authStore.fetchDefaultSetting();

            if (authStore.user.role === 'admin') {
                router.push('/admin/dashboard');
                return;
            }
            router.push('/dashboard');
        } catch (err) {
            showAlert('error', err.message || 'Failed to authenticate user.');
        }
    },

    async fetchDefaultSetting() {
        try {
            const res = await authStore.fetchProtectedApi('default/settings', {}, 'GET');
            authStore.defaultSettings = res.data;
            localStorage.setItem('defaultSettings', JSON.stringify(res.data));
        } catch (err) {
            showAlert('error', err.message || 'Failed to fetch default settings.');
        }
    },

    logout() {
        authStore.isAuthenticated = false;
        authStore.user = {};
        authStore.defaultSettings = {};
        localStorage.setItem('defaultSettings', '{}');
        localStorage.setItem('auth', 'false');
        localStorage.setItem('user', '{}');
        // purchase.emptyCart();
        // sale.emptyCart();
        router.push('/login');
    },

    getUserToken() {
        return authStore.user.token;
    },

    getUserRole() {
        return authStore.user.role
    },
});

export { authStore }




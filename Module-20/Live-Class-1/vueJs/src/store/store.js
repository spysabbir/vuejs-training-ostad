import { reactive } from 'vue';
import router from '../router';
import showAlert from './../helpers/alert';

const authStore = reactive({
    apiBase: 'http://localhost:8000/api/',

    isAuthenticated: localStorage.getItem('auth') === 'true',
    user: JSON.parse(localStorage.getItem('user') || '{}'),
    defaultSettings: JSON.parse(localStorage.getItem('defaultSettings') || '{}'),
    errors: null,

    async fetchApi(endpoint = "", params = {}, requestType = "GET", isProtected = false) {
        let request = {
            method: requestType.toUpperCase(),
            headers: {
                "Accept": "application/json",
                "Content-Type": "application/json",
            },
        };

        if (isProtected) {
            const token = authStore.getUserToken();
            request.headers['Authorization'] = `Bearer ${token}`;
        }

        if (requestType.toUpperCase() === "POST" || requestType.toUpperCase() === "PUT") {
            request.body = JSON.stringify(params);
        }

        try {
            const res = await fetch(authStore.apiBase + endpoint, request);
            const response = await res.json();
            return response;
        } catch (error) {
            showAlert('error', error.message || 'Failed to fetch API.');
            throw error;
        }
    },

    async register(name, email, password, confirm_password) {
        try {
            const res = await authStore.fetchApi('register', { name, email, password, confirm_password }, 'POST');
            if (!res.success) {
                authStore.handleError(res);
                return;
            }
            authStore.clearErrors();
            showAlert('success', res.message || 'User registered successfully.');
            router.push('/login');
        } catch (err) {
            showAlert('error', err.message || 'Failed to register user.');
        }
    },

    async login(email, password) {
        try {
            const res = await authStore.fetchApi('login', { email, password }, 'POST');
            if (!res.success) {
                authStore.handleError(res);
                return;
            }
            authStore.setAuthData(res.data);
            showAlert('success', 'User logged in successfully.');
            router.push(authStore.user.role === 'admin' ? '/admin/dashboard' : '/dashboard');
        } catch (err) {
            showAlert('error', err.message || 'Failed to authenticate user.');
        }
    },

    async fetchDefaultSetting() {
        try {
            const res = await authStore.fetchApi('default/settings', {}, 'GET', true);
            authStore.defaultSettings = res.data;
            localStorage.setItem('defaultSettings', JSON.stringify(res.data));
        } catch (err) {
            showAlert('error', err.message || 'Failed to fetch default settings.');
        }
    },

    logout() {
        authStore.clearAuthData();
        showAlert('success', 'User logged out successfully.');
        router.push('/login');
    },

    getUserToken() {
        return authStore.user.token;
    },

    getUserRole() {
        return authStore.user.role;
    },

    handleError(response) {
        showAlert('error', response.message || 'An error occurred.');
        authStore.errors = response.errors;
    },

    clearErrors() {
        authStore.errors = null;
    },

    setAuthData(data) {
        authStore.isAuthenticated = true;
        authStore.user = data;
        localStorage.setItem('auth', 'true');
        localStorage.setItem('user', JSON.stringify(data));
    },

    clearAuthData() {
        authStore.isAuthenticated = false;
        authStore.user = {};
        authStore.defaultSettings = {};
        localStorage.setItem('auth', 'false');
        localStorage.setItem('user', '{}');
        localStorage.setItem('defaultSettings', '{}');
    },
});

export { authStore };

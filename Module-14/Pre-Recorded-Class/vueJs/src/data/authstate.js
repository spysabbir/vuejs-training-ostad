import { reactive } from 'vue'
import axios from 'axios';
import router from '../router/index.js'

const AuthState = reactive({
    isAuthenticated: false,
    user: null,
    username: 'admin@doe.com',
    password: 'admin',
    login() {
        axios.post('http://localhost:8001/index.php', {
            email: this.username,
            password: this.password
        })
        .then((response) => {
            if(response.data.success == 1){
                this.isAuthenticated = true;
                this.user = response.data;
                this.username = null;
                this.password = null;
                this.saveState()
                router.push('/')
            }
        })
    },
    logout() {
        this.isAuthenticated = false;
        this.user = null;
        this.saveState()
        router.push({name: 'home'})
    },
    saveState() {
        localStorage.setItem('authState', JSON.stringify(this))
    },
    loadState() {
        const authState = localStorage.getItem('authState')
        if(authState) {
            Object.assign(this, JSON.parse(authState))
        }
    }
})

AuthState.loadState()
export default AuthState

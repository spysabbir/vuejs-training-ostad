import { reactive } from 'vue';
import axios from 'axios';
import router from '../router/index'

const AuthState = reactive({
    isAuthenticated: false,
    user: null,
    email: 'admin@doe.com',
    password: 'admin',
    error: null,
    login() {
        axios.post('http://localhost:8001/index.php', {
            email: this.email,
            password: this.password
        })
        .then((response) => {
            if(response.data.success == 1) {
                this.isAuthenticated = true,
                this.user = response.data,
                this.email = null,
                this.password = null,
                this.error = null,
                this.saveState(),
                router.push('/')
            }else{
                this.error = "Invalid Credentials Errors!"
            }
        })
    },
    saveState(){
        localStorage.setItem('authState', JSON.stringify(this))
    },
    loadState(){
        const authState = localStorage.getItem('authState')
        if(authState) {
            Object.assign(this, JSON.parse(authState))
        }
    },
    logout() {
        this.isAuthenticated = false,
        this.user = null,
        this.saveState(),
        router.push('/')
    }
})

AuthState.loadState()
export default AuthState
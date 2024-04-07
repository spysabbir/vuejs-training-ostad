import { createRouter, createWebHistory } from 'vue-router'
import Home from '../components/Home.vue'
import About from '../components/About.vue'
import Contact from '../components/Contact.vue'
import Products from '../components/Products.vue'
import Product from '../components/Product.vue'
import Sidebar from '../components/Sidebar.vue'
import Protected from '../components/Protected.vue'
import Login from '../components/Login.vue'
import {authStore} from '../store/store'
import Cart from '../components/Cart.vue'
import Orders from '../components/Orders.vue'

import Admin from '../components/Admin.vue'
import Editor from '../components/Editor.vue'

const routes = [
    {
        path: '/', components: {
            default: Home,
            LeftSideBar: Sidebar
        }
    },
    {
        path: '/login', components: {
            default: Login,
            LeftSideBar: Sidebar
        }
    },
    {
        path: '/about', components: {
            default: About,
            LeftSideBar: Sidebar
        }
    },
    {
        path: '/admin', components: {
            default: Admin,
            LeftSideBar: Sidebar
        },
        meta:{
            requiresAuth: true,
        }
    },
    {
        path: '/editor', components: {
            default: Editor,
            LeftSideBar: Sidebar
        },
        meta:{
            requiresAuth: true,
        }
    },
    {
        path: '/contact', components: {
            default: Contact,
            LeftSideBar: Sidebar
        }
    },
    {
        path: '/products', components: {
            default: Products,
            LeftSideBar: Sidebar
        }
    },
    {
        path: '/cart', components: {
            default: Cart,
            LeftSideBar: Sidebar
        }
    },
    {
        path: '/orders', components: {
            default: Orders,
            LeftSideBar: Sidebar
        }
    },
    {
        path: '/products/:id', components: {
            default: Product,
            LeftSideBar: Sidebar
        },
        name: 'product',
    },
    {
        path: '/protected', components: {   
            default: Protected,
            LeftSideBar: Sidebar,
        },
        meta:{
            requiresAuth: true
        }
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    if(to.meta.requiresAuth && !authStore.isAuthenticated){
        next('/login')
    }else{
        next()
    }
})

export default router
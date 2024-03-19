import { createWebHistory, createRouter } from 'vue-router'

import Home from '../components/Home.vue'
import About from '../components/About.vue'
import Blog from '../components/Blog.vue'
import Portfolio from '../components/Portfolio.vue'
import Contact from '../components/Contact.vue'
import RightSideber from '../components/RightSideber.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/about', component: About, name: 'about' },
    // { path: '/blog', component: Blog },
    { 
        path: '/blog',
        components: {
            default: Blog,
            right: RightSideber,
        } 
    },
    { 
        path: '/blog/tag/:tag',
        components: {
            default: Blog,
            right: RightSideber,
        },
        name: 'tags'
    },
    { path: '/portfolio', component: Portfolio, name: 'portfolio' },
    { path: '/contact', component: Contact },
]

const router = createRouter({
  history: createWebHistory (),
  routes: routes,
})

export default router
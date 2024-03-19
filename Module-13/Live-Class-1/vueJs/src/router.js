import { createWebHistory , createRouter } from 'vue-router'

import Home from './components/Home.vue'
import About from './components/About.vue'
import Blog from './components/Blog.vue'
import Contact from './components/Contact.vue'
import BlogList from './components/blog/BlogList.vue'
import BlogDetails from './components/blog/BlogDetails.vue'

const routes = [
    { 
        path: '/',
        name: 'Home',
        component: Home 
    },
    { 
        path: '/about',
        name: 'About',
        component: About 
    },
    { 
        path: '/blog',
        name: 'Blog',
        component: Blog,
        children: [
            { 
                path: '',
                name: 'BlogList',
                component: BlogList 
            },
            { 
                path: 'details/:id',
                name: 'BlogDetails',
                component: BlogDetails 
            },
        ]
    },
    { 
        path: '/contact',
        name: 'Contact',
        component: Contact 
    },
]

const router = createRouter({
    history: createWebHistory (),
    routes,
})

export default router
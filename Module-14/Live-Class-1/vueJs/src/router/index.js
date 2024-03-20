import { createWebHistory, createRouter } from 'vue-router'

import HomeView from './../views/Home.vue'
import AboutView from './../views/About.vue'
import LoginView from './../views/Login.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    component: AboutView
  },
  {
    path: '/login',
    name: 'login',
    component: LoginView
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
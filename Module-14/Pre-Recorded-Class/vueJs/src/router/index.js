import { createWebHistory, createRouter } from 'vue-router'

import HomeView from './../views/HomeView.vue'
import AboutView from './../views/AboutView.vue'
import LoginView from './../views/LoginView.vue'
import SecretView from './../views/SecretView.vue'

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
  },
  {
    path: '/secret',
    name: 'secret',
    component: SecretView
  },
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
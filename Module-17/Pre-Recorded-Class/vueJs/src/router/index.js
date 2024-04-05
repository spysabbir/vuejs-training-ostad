import { createWebHistory , createRouter } from 'vue-router'

import Home from '../views/Home.vue'
import Compute from '../views/Compute.vue'
import Watch from '../views/Watch.vue'

const routes = [
  { 
    path: '/', 
    component: Home 
  },
  { 
    path: '/compute', 
    component: Compute 
  },
  { 
    path: '/watch', 
    component: Watch 
  },
]

const router = createRouter({
  history: createWebHistory (),
  routes,
})

export default router
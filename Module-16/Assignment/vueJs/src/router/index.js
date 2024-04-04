import { createRouter, createWebHistory } from 'vue-router';

import BlogList from '../components/BlogList.vue';
import BlogDetails from '../components/BlogDetails.vue';

const routes = [
  { 
    path: '/',
    name: 'Blogs',
    component: BlogList
  },
  { 
    path: '/blog/:id',
    name: 'BlogDetails',
    component: BlogDetails
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;

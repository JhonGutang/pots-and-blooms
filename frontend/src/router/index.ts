import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import Login from '@/views/auth/Login.vue'
import Register from '@/views/auth/Register.vue'
import Flowers from '@/views/FlowerSection.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue'),
    }, {
      path: '/auth', 
      name: 'Auth' ,
      component: Login
    }, 
    {
      path: '/auth-registration', 
      name: 'Auth-Registration',
      component: Register
    },
    {path: '/flowers',
      name: 'Flowers',
      component: Flowers
    }
  ],
})

export default router

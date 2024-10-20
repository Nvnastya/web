import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutView from '@/views/AboutView.vue'
import AuthorizationView from '@/views/AuthorizationView.vue'
import BasketView from '@/views/BasketView.vue'
import SaleView from '@/views/SaleView.vue'
import ContactView from '@/views/ContactView.vue'
import DocView from '@/views/DocView.vue'
import ItemView from '@/views/ItemView.vue'
import RegistrationView from '@/views/RegistrationView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/authorization',
      name: 'authorization',
      component: AuthorizationView
    },
    {
      path: '/registration',
      name: 'registration',
      component: RegistrationView
    },
    {
      path: '/basket',
      name: 'basket',
      component: BasketView
    },
    {
      path: '/sale',
      name: 'sale',
      component: SaleView
    },

    {
      path: '/shops',
      name: 'shops',
      component: AboutView
    },
    {
      path: '/contact',
      name: 'contact',
      component: ContactView
    },
    {
      path: '/doc',
      name: 'doc',
      component: DocView
    },

    {
      path: '/item/:id',
      name: 'item-info',
      component: ItemView
    }
  ]
})

export default router

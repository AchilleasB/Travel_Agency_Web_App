import { createRouter, createWebHistory } from 'vue-router'

import Home from '../views/Home.vue'
import About from '../views/About.vue'
import Account from '../views/Account.vue'
import Resrevation from '../views/Reservation.vue'
import Profile from '../views/Profile.vue'
import Destination from '../views/Destination.vue'
import Category from '../views/Category.vue'
import TripList from '../views/TripList.vue'

const routes = [
  { path: '/', name: 'home', component: Home },
  { path: '/about', name: 'about', component: About },
  { path: '/destination', name: 'destination', component: Destination },
  { path: '/destination/:id', name: 'destination-trips', component: TripList, props: route=>({id: parseInt(route.params.id)})},
  { path: '/category', name: 'category', component: Category},
  { path: '/category/:id', name: 'category-trips', component: TripList, props: route=>({id: parseInt(route.params.id)})},
  { path: '/account', name: 'account', component: Account},
  { path: '/reservation', name: 'reservation', component: Resrevation},
  { path: '/profile', name: 'profile', component: Profile},
  { path: '/:pathMatch(.*)*', name: 'not-found', redirect: { name: 'home' } }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: routes
})

export default router

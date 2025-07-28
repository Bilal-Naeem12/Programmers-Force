import { createMemoryHistory, createRouter, createWebHistory } from 'vue-router'

import HomeView from '../pages/Home/index.vue'
import AboutView from '../pages/About/index.vue'
import Store from '../pages/Store/index.vue'
import ProductDetail from '../pages/ProductDetail/index.vue'
const routes = [
  { path: '/', component: HomeView },
  { path: '/about', component: AboutView },
   { path: '/store', component: Store },
   {
  path: '/product/:id',
  name:"product-detail",
  component: ProductDetail
}
]

const router = createRouter({
  history: createWebHistory(),
  routes,
})



export default router
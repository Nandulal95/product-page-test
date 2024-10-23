import { createRouter, createWebHashHistory } from 'vue-router'

const router = createRouter({
  history: createWebHashHistory(),
  routes: [
    {
      path: '/',
      //redirect: () => ({ name: 'product', params: { slug: 'fall-limited-edition-sneakers' } })
      component: () => import('./views/Home.vue')
    },
    {
      path: '/shop/product/:slug',
      name: 'product',
      component: () => import('./views/Product.vue')
    },
    {
      path: '/404',
      component: () => import('./views/404.vue')
    },
    {
      path: '/*',
      redirect: '/404'
    }
  ],
})

export default router;
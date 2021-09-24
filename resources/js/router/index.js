import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/orders',
    name: 'Orders',
    meta: {auth: true},
    component: () => import('@/js/views/Orders')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

router.beforeEach((to, from, next) => {
  let user = JSON.parse(localStorage.getItem('user'))
  if (to.meta.auth && !user.id) {
    window.location.href = 'login'
  } else {
    next()
  }
})

export default router

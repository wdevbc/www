import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router)

export default new Router({
  mode: 'history',
  routes: [
    {
      path: '/',
      redirect: '/home'
    },
    {
      path: '/home',
      name: 'Home',
      component: () => import('@/view/Home.vue')
    },
    {
      path: '/board',
      name: 'Board',
      component: () => import('@/view/Board.vue')
    }
  ]
})

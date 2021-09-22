import Vue from 'vue'
import Router from 'vue-router'
import Pokedex from '@/components/Pokedex'
import Show from '@/components/Show'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Pokedex',
      component: Pokedex
    },
    {
      path: '/:id',
      name: 'Show',
      component: Show
    }
  ]
})

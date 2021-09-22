import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/components/Index'
import Note from '@/components/Note'
import New from '@/components/New'
import Edit from '@/components/Edit'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Index',
      component: Index
    },
    {
      path: '/note/:id',
      name: 'Note',
      component: Note
    },
    {
      path: '/new',
      name: 'New',
      component: New
    },
    {
      path: '/edit/:id',
      name: 'Edit',
      component: Edit
    }
  ]
})

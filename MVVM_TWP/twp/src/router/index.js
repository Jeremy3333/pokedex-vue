import Vue from 'vue'
import Router from 'vue-router'
import Index from '@/components/Index'
import New from '@/components/New'
import Post from '@/components/SelectPost'
import Edit from '@/components/EditPost'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Index',
      component: Index
    },
    {
      path: '/new',
      name: 'New',
      component: New
    },
    {
      path: '/post/:id',
      name: 'Post',
      component: Post
    },
    {
      path: '/editpost/:id',
      name: 'Edit',
      component: Edit
    }
  ]
})

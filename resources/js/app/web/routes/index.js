import {Homepage, WebBook, WebChapter } from '../components'

export default [
  {
    path: '/',
    component: Homepage,
    name: 'homepage',
    meta: {
      guest: true,
      needsAuth: false
    }
  },
  {
    path: '/book',
    component: WebBook,
    name: 'webBook',
    meta: {
      guest: true,
      needsAuth: false
    }
  },
  {
    path: '/book/chapter',
    component: WebChapter,
    name: 'webChapter',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
]

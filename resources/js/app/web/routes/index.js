import {Homepage} from '../components'

export default [
  {
    path: '/',
    component: Homepage,
    name: 'homepage',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
]

import { LoginPage } from '../components'

export default [
  {
    path: '/login',
    component: LoginPage,
    name: 'login',
    meta: {
      guest: true,
      needsAuth: false
    }
  }
]

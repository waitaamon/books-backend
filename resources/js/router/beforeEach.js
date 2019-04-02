import store from '../store'
import localforage from 'localforage'

// eslint-disable-next-line no-console
const beforeEach = ((to, from, next) => {
  store.dispatch('auth/checkTokenExists').then(() => {
    if (to.meta.guest) {
      next({name: 'homepage'})
      return
    }
    next()
  }).catch(() => {
    if (to.meta.needsAuth) {
      localforage.setItem('intended', to.name)
      next({name: 'login'})
      return
    }
    next()
  })
})

export default beforeEach

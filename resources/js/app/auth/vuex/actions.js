import {setHttpToken} from '../../../helpers'
import {isEmpty} from 'lodash'
import localforage from 'localforage'

export const register = ({dispatch}, payload) => {
  return window.axios.post('/api/register', payload).then((response) => {
    // set token
    dispatch('setToken', response.data.meta.token).then(() => {
      dispatch('fetchUser')
    })
  })
}

export const login = ({dispatch}, payload) => {
  return window.axios.post('/api/login', payload).then((response) => {
    // set token
    dispatch('setToken', response.data.meta.token).then(() => {
      dispatch('fetchUser')
    })
  })
}

export const setToken = ({commit, dispatch}, token) => {
  if (isEmpty(token)) {
    return dispatch('checkTokenExists').then((token) => {
      setHttpToken(token)
    })
  }
  commit('setToken', token)
  // set http token
  setHttpToken(token)
}

export const checkTokenExists = () => {
  return localforage.getItem('authtoken').then((token) => {
    if (isEmpty(token)) {
      return Promise.reject(Error('NO_STORAGE_TOKEN'))
    }
    return Promise.resolve(token)
  })
}

export const fetchUser = ({commit}) => {
  return window.axios.get('/api/me').then(response => {
    commit('setAuthenticated', true)
    commit('setUserData', response.data)
  })
}

export const logout = ({dispatch}) => {
  return window.axios.post('/api/logout').then(() => {
    dispatch('clearAuth')
  })
}

export const clearAuth = ({commit}) => {
  commit('setAuthenticated', false)
  commit('setUserData', null)
  commit('setToken', null)
  setHttpToken(null)
}

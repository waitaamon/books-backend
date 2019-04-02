export const addLanguage = ({ dispatch }, payload) => {
  return window.axios.post('/api/languages', payload)
    .then(response => {
    // set languages
      dispatch('setLanguages', response.data)
    })
}

export const getLanguages = ({ commit }) => {
  return window.axios.get('/api/languages')
    .then(response => {
      // set languages
      commit('setLanguages', response.data)
    })
}

export const updateLanguage = ({ commit }, payload) => {
  return window.axios.patch('/api/languages/' + payload.id, payload)
    .then(response => {
      // set languages
      commit('setLanguages', response.data)
    })
}

export const deleteLanguage = ({ commit }, payload) => {
  return window.axios.delete('/api/languages/' + payload.id)
    .then(response => {
      // set languages
      commit('setLanguages', response.data)
    })
}

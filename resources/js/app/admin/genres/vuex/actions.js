export const addGenre = ({ dispatch }, payload) => {
  return window.axios.post('/api/genres', payload)
    .then(response => {
    // set genres
    dispatch('setGenres', response.data)
    
  })
}

export const getGenres = ({ commit }) => {
  return window.axios.get('/api/genres')
    .then(response => {
      // set genres
      commit('setGenres', response.data)
    })
}

export const updateGenre = ({ commit }, payload) => {
  return window.axios.patch('/api/genres/' + payload.id, payload)
    .then(response => {
      // set genres
      commit('setGenres', response.data)
    })
}

export const deleteGenre = ({ commit }, payload ) => {
  return window.axios.delete('/api/genres/' + payload.id)
    .then(response => {
      // set genres
      commit('setGenres', response.data)
    })
}

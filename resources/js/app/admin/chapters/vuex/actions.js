export const addChapter = ({ dispatch }, payload) => {
  return window.axios.post('/api/chapters', payload)
    .then(response => {
    // set chapters
    dispatch('setBooks', response.data )
  })
}

export const updateChapter = ({ commit }, payload) => {
  return window.axios.patch('/api/books/' + payload.id, payload)
    .then(response => {
      // set books
      commit('setBooks', response.data)
    })
}

export const deleteBook = ({ commit }, payload) => {
  return window.axios.delete('/api/books/' + payload.id, payload)
    .then( response => {
      // set books
      commit('setBooks', response.data)
    })
}

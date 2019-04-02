export const addBook = ({ dispatch }, payload) => {
  return window.axios.post('/api/books', payload)
    .then(response => {
    // set books
    dispatch('setBooks', response.data)
  })
}

export const getBooks = ({ commit }) => {
  return window.axios.get('/api/books')
    .then(response => {
      // set books
      commit('setBooks', response.data)
    })
}

export const updateBook = ({ commit }, payload) => {
  return window.axios.patch('/api/books/' + payload.id, payload)
    .then(response => {
      // set book
      commit('setBooks', response.data)
    })
}

export const deleteBook = ({ commit }, payload) => {
  return window.axios.delete('/api/books/' + payload.id)
    .then( response => {
      // set books
      commit('setBooks', response.data)
    })
}

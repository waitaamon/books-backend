export const addBook = ({ commit }, payload) => {
  return window.axios.post('/api/books', payload)
    .then(response => {
    // set books
    commit('setBooks', response.data)
  })
}
export const getBooks = ({ commit }) => {
    return window.axios.get('/api/books')
        .then(response => {
            // set books
            commit('setBooks', response.data)
        })
}

export const getBook = ({ commit }, id) => {
    return window.axios.get('/api/books/' + id)
        .then(response => {
            // set book
            commit('setBook', response.data)
        })
}

export const updateBook = ({ commit }, payload) => {
  return window.axios.patch('/api/books/' + payload.id, payload)
    .then(response => {
      // set book
      commit('setBooks', response.data)
    })
}

export const deleteBook = ({ commit }, id) => {
  return window.axios.delete('/api/books/' + id)
    .then( response => {
      // set books
      commit('setBooks', response.data)
    })
}

export const publish = ({ commit }, payload) => {
  return window.axios.post('/api/book/publish/' + payload.id, payload)
    .then( response => {
      // set book
      commit('setBook', response.data)
    })
}

export const featured = ({ commit }, payload) => {
  return window.axios.post('/api/book/feature/' + payload.id, payload)
    .then( response => {
      // set book
      commit('setBook', response.data)
    })
}

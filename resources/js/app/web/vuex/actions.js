export const getBooks = ({ commit }) => {
    return window.axios.get('/api/all-books')
        .then(response => {
            // set books
            commit('setBooks', response.data)
        })
}

export const getBook = ({ commit }, id) => {
    return window.axios.get('/api/book/' + id)
        .then(response => {
            // set book
            commit('setBook', response.data)
        })
}

export const getChapter = ({ commit }, id) => {
    return window.axios.get('/api/chapter/' + id)
        .then(response => {
            // set chapter
            commit('setChapter', response.data)
        })
}
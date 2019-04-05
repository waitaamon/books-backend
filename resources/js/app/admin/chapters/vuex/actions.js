export const addChapter = ({ dispatch }, payload) => {
  return window.axios.post('/api/chapters', payload)
    .then(response => {
    // set chapter
    dispatch('setChapter', response.data )
  })
}

export const getChapter = ({ commit }, id) => {
  return window.axios.get('/api/chapters/' + id )
    .then(response => {
      // set chapter
      commit('setChapter', response.data)
    })
}

export const updateChapter = ({ commit }, payload) => {
  return window.axios.patch('/api/chapters/' + payload.id, payload)
    .then(response => {
      // set chapter
      commit('setChapter', response.data)
    })
}

export const deleteChapter = ({ commit }, id) => {
  return window.axios.delete('/api/chapters/' + id)
    .then( response => {
      // set chapter
      commit('setChapter', response.data)
    })
}

export const getChapter = ({ dispatch, commit }, id) => {
  return window.axios.get('/api/chapter/' + id )
      .then(response => {
        // set chapter
        commit('setChapter', response.data)
        commit('setMobileView', true, {root: true})
      })
}

export const addTopic = ({dispatch}, payload) => {
  return window.axios.post('/api/topics', payload)
    .then(response => {
      // set topics
      dispatch('setTopics', response.data)
    })
}

export const getTopics = ({commit}) => {
  return window.axios.get('/api/topics')
    .then(response => {
      // set topics
      commit('setTopics', response.data)
    })
}

export const updateTopic = ({commit}, payload) => {
  return window.axios.patch('/api/topics/' + payload.id, payload)
    .then(response => {
      // set topics
      commit('setTopics', response.data)
    })
}

export const deleteTopic = ({commit}, payload) => {
  return window.axios.delete('/api/topics/' + payload.id)
    .then(response => {
      // set topics
      commit('setTopics', response.data)
    })
}

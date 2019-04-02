export const addImage = ({ dispatch }, payload) => {
  return window.axios.post('/api/images', payload,{
    headers: {
      'Content-Type': 'multipart/form-data'
    }
  })
    .then(response => {
    // set images
    dispatch('setImages', response.data)
    
  })
}

export const getImages = ({ commit }) => {
  return window.axios.get('/api/images')
    .then(response => {
      // set images
      commit('setImages', response.data)
    })
}

export const updateImage = ({ commit }, payload ) => {
  return window.axios.patch('/api/images/' + payload.id, payload)
    .then(response => {
      // set images
      commit('setImages', response.data)
    })
}

export const deleteImage = ({ commit }, payload ) => {
  return window.axios.delete('/api/images/' + payload.id)
    .then(response => {
      // set images
      commit('setImages', response.data)
    })
}

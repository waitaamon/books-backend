export const setValidationErrors = ({ commit }, errors) => {
    commit('setValidationErrors', errors)
}

export const clearValidationErrors = ({ commit }) => {
    commit('setValidationErrors', [])
}

export const setLoading = ({ commit }, trueOrFalse) => {
    commit('setLoading', trueOrFalse)
}

export const setSnackBar = ({ commit }, payload) => {
    commit('setSnackBar', payload)
}
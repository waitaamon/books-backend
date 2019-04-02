
export const setValidationErrors = (state, errors) => {
    state.validation = errors
}

export  const setLoading = (state, trueOrFalse) => {

    state.loading = trueOrFalse
}

export const setSnackBar = (state, data) => {
    state.snackbar = data
}
export const setDrawer = (state, data) => {
    state.drawer = data
}



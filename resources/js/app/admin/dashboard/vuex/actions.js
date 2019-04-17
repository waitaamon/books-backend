export const getPrerequisites = ({commit}) => {
    return axios.get('/api/getPrerequisites')
        .then(response => {
            commit('setStats', {
                books_count: response.data.books,
                published_books_count: response.data.published_books,
                unpublished_books_count: response.data.unpublished_books,
                users_count: response.data.users,
            })
        })
}

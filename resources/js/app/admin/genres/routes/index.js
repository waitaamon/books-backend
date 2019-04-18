import { GenrePage } from '../components'

export default [
    {
        path: '/admin/genres',
        component: GenrePage,
        name: 'genre',
        meta: {
            guest: false,
            needsAuth: true
        }
    }
]
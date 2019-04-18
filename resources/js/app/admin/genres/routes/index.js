import { GenrePage } from '../components'

export default [
    {
        path: '/admin/genre',
        component: GenrePage,
        name: 'genre',
        meta: {
            guest: false,
            needsAuth: true
        }
    }
]
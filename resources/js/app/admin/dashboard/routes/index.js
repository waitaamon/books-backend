import { Dashboard } from '../components'

export default [
    {
        path: '/admin/dashboard',
        component: Dashboard,
        name: 'dashboard',
        meta: {
            guest: false,
            needsAuth: true
        }
    }
]
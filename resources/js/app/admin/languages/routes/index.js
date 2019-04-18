import { LanguagePage } from '../components'

export default [
    {
        path: '/admin/languages',
        component: LanguagePage,
        name: 'language',
        meta: {
            guest: false,
            needsAuth: true
        }
    }
]
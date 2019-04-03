import { BooksPage } from '../components'

export default [
    {
        path: '/admin/books',
        component: BooksPage,
        name: 'books',
        meta: {
            guest: false,
            needsAuth: true
        }
    }
]
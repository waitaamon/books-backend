import { BooksPage, CreateBook, ShowBook } from '../components'

export default [
    {
        path: '/admin/books',
        component: BooksPage,
        name: 'books',
        meta: {
            guest: false,
            needsAuth: true
        }
    },
    {
        path: '/admin/book/create',
        component: CreateBook,
        name: 'create-book',
        meta: {
            guest: false,
            needsAuth: true
        }
    },
    {
        path: '/admin/book/show',
        component: ShowBook,
        name: 'showBook',
        meta: {
            guest: false,
            needsAuth: true
        }
    }
]
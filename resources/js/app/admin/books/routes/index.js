import { BooksPage, CreateBook, ShowBook, EditBook } from '../components'

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
    },
    {
        path: '/admin/book/edit',
        component: EditBook,
        name: 'editBook',
        meta: {
            guest: false,
            needsAuth: true
        }
    }
]
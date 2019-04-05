import { CreateChapter, EditChapter } from '../components'

export default [
    {
        path: '/admin/chapter',
        component: EditChapter,
        name: 'editChapter',
        meta: {
            guest: false,
            needsAuth: true
        }
    },
    {
        path: '/admin/chapter/create',
        component: CreateChapter,
        name: 'createChapter',
        meta: {
            guest: false,
            needsAuth: true
        }
    }
]
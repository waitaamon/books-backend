import { MobileChapter } from '../components'
export default [
    {
        path: '/chapter/:chapterId',
        name: 'mobile-chapter',
        component: MobileChapter,
        meta: {
            guest: true,
            needsAuth: false
        }
    }
]
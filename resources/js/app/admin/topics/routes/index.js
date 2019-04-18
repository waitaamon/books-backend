import { TopicPage } from '../components'

export default [
    {
        path: '/admin/topics',
        component: TopicPage,
        name: 'topic',
        meta: {
            guest: false,
            needsAuth: true
        }
    }
]
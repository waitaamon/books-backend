import { GalleryPage } from '../components'

export default [
    {
        path: '/admin/gallery',
        component: GalleryPage,
        name: 'gallery',
        meta: {
            guest: false,
            needsAuth: true
        }
    }
]
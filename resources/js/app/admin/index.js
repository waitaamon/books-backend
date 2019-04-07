import dashboard from './dashboard/routes'
import books from './books/routes'
import chapters from './chapters/routes'
import gallery from './gallery/routes'

export default [...dashboard, ...books, ...chapters, ...gallery]

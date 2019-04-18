import dashboard from './dashboard/routes'
import books from './books/routes'
import chapters from './chapters/routes'
import gallery from './gallery/routes'
import genres from './genres/routes'
import languages from './languages/routes'
import topics from './topics/routes'

export default [...dashboard, ...books, ...chapters, ...gallery, ...genres, ...languages, ...topics]

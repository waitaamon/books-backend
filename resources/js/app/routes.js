/**
 * Created by Amon waita on 8/1/17.
 */

import web from './web/routes'
import auth from './auth/routes'
import admin from './admin'
import errors from './errors/routes'

export default [ ...web, ...auth, ...admin, ...errors ]

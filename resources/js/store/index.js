import Vue from 'vue'
import Vuex from 'vuex'

import auth from '../app/auth/vuex'
import home from '../app/web/vuex'
import book from '../app/admin/books/vuex'
import language from '../app/admin/languages/vuex'
import genre from '../app/admin/genres/vuex'
import topic from '../app/admin/topics/vuex'
import image from '../app/admin/gallery/vuex'

import state from './state'
import * as mutations from './mutations'
import * as actions from './actions'
import * as getters from './getters'

Vue.use(Vuex)

export default new Vuex.Store({
  state,
  mutations,
  actions,
  getters,
  modules: {
    auth,
    home,
    book,
    language,
    genre,
    topic,
    image
  }
})

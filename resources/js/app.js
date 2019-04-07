require('./bootstrap');
require('./interceptors')
import store from './store'
import router from './router'
import VueToastr from '@deveodk/vue-toastr'
import '@deveodk/vue-toastr/dist/@deveodk/vue-toastr.css'

window.Vue = require('vue');

Vue.use(VueToastr, {
    defaultPosition: 'toast-top-right',
    defaultType: 'success',
    defaultTimeout: 1000
})


Vue.component('app', require('./components/App.vue').default)

store.dispatch('auth/setToken').then(() => {
    store.dispatch('auth/fetchUser').catch(() => {
        //clear auth
        store.dispatch('auth/clearAuth')
        router.replace({ name: 'login'})
    })
}).catch(() => {
    //clear auth
    store.dispatch('auth/clearAuth')

})

const app = new Vue({
    store,
    router,
    el: '#app'
});

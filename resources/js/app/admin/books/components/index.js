import Vue from 'vue'

export const BooksPage = Vue.component('books-page', require('./BooksPage.vue').default)
export const CreateBook = Vue.component('create-book', require('./CreateBook.vue').default)
export const ShowBook = Vue.component('show-book', require('./ShowBook.vue').default)
export const EditBook = Vue.component('edit-book', require('./EditBook.vue').default)
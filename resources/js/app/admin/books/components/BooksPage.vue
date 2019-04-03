<template>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">overview</h2>
                    <button class="au-btn au-btn-icon au-btn--blue">
                        <i class="zmdi zmdi-plus"></i>add Book
                    </button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="top-campaign">
                    <vuetable ref="vuetable"
                                  api-url="https://vuetable.ratiw.net/api/users"
                                  :fields="['name', 'nickname', 'email', 'gender']"
                                  data-path=""
                                  pagination-path=""
                        ></vuetable>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'
    import Vuetable from 'vuetable-2'
    export default {
        name: 'books-page',
        components: {
            Vuetable
        },
        data() {
            return {}
        },
        computed: {
            ...mapGetters({
                books: 'book/books'
            })
        },
        methods: {
            ...mapActions({
                getBooks: 'book/getBooks'
            })
        },
        created () {
            this.getBooks()
        }
    }
</script>

<style scoped>

</style>
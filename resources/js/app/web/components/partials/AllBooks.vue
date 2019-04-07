<template>
    <div class="section">
        <div class="container">
            <div class="row" v-if="books.length > 0">
                <div class="col-md-10 offset-1" v-for="book in books">
                    <div class="post post-row">
                        <router-link class="post-img" :to="{name: 'webBook', query: {ref: book.id, v: book.slug }}"><img :src="book.post_url" :alt="book.title"></router-link>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="#" v-for="genre in book.genres">{{ genre.title }}</a>
                            </div>
                            <h3 class="post-title"><a href="">{{ book.title }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="#">{{ book.author}}</a></li>
                                <li>{{ book.published_on}}</li>
                            </ul>
                            <p> {{ book.description }}...</p>
                        </div>
                    </div>

                    <div class="section-row loadmore text-center">
                        <a href="#" class="primary-button">Load More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'
    export default {
        name: 'all-books',
        data() {
            return {
                books: []
            }
        },
        watch: {
            allBooks: function (val) {
                this.allBooks.forEach(book => {
                    if(!book.featured) {
                        this.books.push(book)
                    }
                })
            }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                allBooks: 'web/books'
            })
        },
        methods: {
            ...mapActions({})
        }
    }
</script>

<style scoped>

</style>
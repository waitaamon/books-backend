<template>
    <div class="section">
        <div class="container">
            <div id="hot-post" class="row hot-post" v-if="books.length > 0">
                <div class="col-md-8 hot-post-left">
                    <div class="post post-thumb">
                        <a class="post-img" href="#"><img :src="books[0].banner_url" :alt="books[0].title"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="#" v-for="genre in books[0].genres"> {{ genre.title }}</a>
                            </div>
                            <h3 class="post-title title-lg"><a href="#">{{ books[0].title }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="#">{{ books[0].author }}</a></li>
                                <li>{{ books[0].published_on }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 hot-post-right">
                    <div class="post post-thumb">
                        <a class="post-img" href="#"><img :src="books[1].banner_url" :alt="books[1].title"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="#" v-for="genre in books[1].genres"> {{ genre.title }}</a>
                            </div>
                            <h3 class="post-title"><a href="#">{{ books[1].title }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="#">{{ books[1].author }}</a></li>
                                <li>2{{ books[1].published_on }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="post post-thumb">
                        <a class="post-img" href="#"><img :src="books[2].banner_url" :alt="books[2].title"></a>
                        <div class="post-body">
                            <div class="post-category">
                                <a href="#" v-for="genre in books[2].genres"> {{ genre.title }}</a>
                            </div>
                            <h3 class="post-title"><a href="#">{{ books[2].title }}</a></h3>
                            <ul class="post-meta">
                                <li><a href="#">{{ books[2].author }}</a></li>
                                <li>2{{ books[2].published_on }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'
    export default {
        name: 'homepage-featured',
        data() {
            return {
                books: []
            }
        },
        watch: {
            allBooks: function (val) {
                this.allBooks.forEach(book => {
                    if(book.featured) {
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
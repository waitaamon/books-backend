<template>
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row mb-5">
                    <div class="col-md-4">
                        <h6 class="h5=6 display-5 mb-2">Title</h6>
                        <p>{{ book ? book.title : '' }}</p>
                    </div>
                    <div class="col-md-3">
                        <h6 class="h5=6 display-5 mb-2">Author</h6>
                        <p>{{ book ? book.author : '' }}</p>
                    </div>
                    <div class="col-md-3">
                        <h6 class="h5=6 display-5 mb-2">Publisher</h6>
                        <p>{{ book ? book.publisher : '' }}</p>
                    </div>
                    <div class="col-md-2">
                        <h6 class="h5=6 display-5 mb-2">Language</h6>
                        <p>{{ book ? book.language.title : '' }}</p>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-4">
                        <h6 class="h5=6 display-5 mb-2">Topics</h6>
                        <p v-if="book !== null"> <span v-for=" topic in book.topics"> {{ topic.title }}, </span></p>
                    </div>
                    <div class="col-md-3">
                        <h6 class="h5=6 display-5 mb-2">Genre</h6>
                        <p v-if="book !== null"> <span v-for=" genre in book.genres"> {{ genre.title }}, </span></p>
                    </div>
                    <div class="col-md-3">
                        <h6 class="h5=6 display-5 mb-2">Uploaded by</h6>
                        <p>{{ book ? book.user.name : '' }}</p>
                    </div>
                    <div class="col-md-2">
                        <h6 class="h5=6 display-5 mb-2">Publish</h6>
                        <label class="switch switch-3d switch-primary mr-3">
                            <input type="checkbox" class="switch-input" v-model="checked" @change="publish">
                            <span class="switch-label"></span>
                            <span class="switch-handle"></span>
                        </label>
                    </div>
                </div>
            </div>

        </div>
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-9"></div>
                    <div class="col-md-3">
                        <router-link class="btn btn-block btn-primary" :to="{name: 'createChapter', query: { ref: book ? book.id : '' }}">New Chapter</router-link>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-body">
                <table class="table table-borderless table-data3" v-if="book !== null && book.chapters.length > 0">
                    <thead>
                    <tr>
                        <th>date</th>
                        <th>title</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="chapter in book.chapters">
                        <td>2018-09-29 05:57</td>
                        <td>{{ chapter.title}}</td>
                        <td>{{ chapter.is_live ? 'true' : 'false'}}</td>
                        <td><router-link class="btn btn-sm btn-secondary" :to="{ name: 'editChapter', query: { ref: chapter.id, slug: chapter.slug }}"><i class="fas fa-eye"></i></router-link></td>
                    </tr>
                    </tbody>
                </table>
                <p v-else class="text-center">No chapters</p>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'show-book',
        data() {
            return {
                checked: false
            }
        },
        watch: {
            book: function(val)  {
                this.checked = this.book ? this.book.is_live : false
            }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                book: 'book/book'
            })
        },
        methods: {
            ...mapActions({
                getBook: 'book/getBook',
                publishBook: 'book/publish'
            }),
            publish(event) {
                let status = event.target.checked
                this.publishBook({action: status, id: this.book.id})
                    .then(() => {
                        this.$toastr('success', status ? 'Successfully published' : 'Successfully unpublished')
                    })
            }
        },
        created () {
            this.getBook(this.$route.query.ref)
        }
    }
</script>

<style scoped>

</style>
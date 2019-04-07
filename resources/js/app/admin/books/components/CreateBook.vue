<template>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <strong>New</strong> Book
            </div>
            <form method="post" @submit.prevent="submit">
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="title" class=" form-control-label">Title</label>
                        <input type="text" id="title" placeholder="Enter title ..." class="form-control" v-model="form.title">
                        <small v-if="errors.title" class="help-block text-danger text-sm-left">{{ errors.title[0]}}</small>
                    </div>
                    <div class="form-group">
                        <label for="author" class=" form-control-label">Author</label>
                        <input type="text" id="author" placeholder="Enter author ..." class="form-control" v-model="form.author">
                        <small v-if="errors.author" class="help-block text-danger text-sm-left">{{ errors.author[0]}}</small>
                    </div>
                    <div class="form-group">
                        <label for="publisher" class=" form-control-label">Publisher</label>
                        <input type="text" id="publisher" placeholder="Enter publisher ..." class="form-control" v-model="form.publisher">
                        <small v-if="errors.publisher" class="help-block text-danger text-sm-left">{{ errors.publisher[0]}}</small>
                    </div>
                    <div class="form-group">
                        <label for="language" class=" form-control-label">Select language</label>
                        <multiselect v-model="form.language" :options="languages" label="title" placeholder="select language..."></multiselect>
                        <small v-if="errors.language" class="help-block text-danger text-sm-left">{{ errors.language[0]}}</small>
                    </div>
                    <div class="form-group">
                        <label for="genre" class=" form-control-label">Select genres</label>
                        <multiselect v-model="form.genres" :options="genres" :multiple="true" label="title" placeholder="select genres..."></multiselect>
                        <small v-if="errors.genres" class="help-block text-danger text-sm-left">{{ errors.genres[0]}}</small>
                    </div>
                    <div class="form-group">
                        <label for="topic" class=" form-control-label">Select topics</label>
                        <multiselect v-model="form.topics" :options="topics" :multiple="true" label="title" placeholder="select topics..."></multiselect>
                        <small v-if="errors.topics" class="help-block text-danger text-sm-left">{{ errors.topics[0]}}</small>
                    </div>
                    <div class="form-group">
                        <label for="image" class=" form-control-label">Featured image</label>
                        <input type="file" id="image" class=" form-control form-control-file" ref="featuredImage" @change="addImage">
                        <small v-if="errors.image" class="help-block text-danger text-sm-left">{{ errors.image[0]}}</small>
                    </div>
                    <div class="form-group">
                        <label for="description" class=" form-control-label">Book description</label>
                        <textarea class="form-control" id="description" v-model="form.description"></textarea>
                        <small v-if="errors.description" class="help-block text-danger text-sm-left">{{ errors.description[0]}}</small>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'
    import Multiselect from 'vue-multiselect'
    export default {
        name: 'create-book',
        components: {
            Multiselect
        },
        data() {
            return {
                form : {
                    title: '',
                    author: '',
                    publisher: '',
                    language: '',
                    description: '',
                    image: '',
                    genres: [],
                    topics: []
                }
            }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                languages: 'language/languages',
                genres: 'genre/genres',
                topics: 'topic/topics'
            })
        },
        methods: {
            ...mapActions({
                getLanguages: 'language/getLanguages',
                getGenres: 'genre/getGenres',
                getTopics: 'topic/getTopics',
                addBook: 'book/addBook'
            }),
            addImage() {
                this.form.image = this.$refs.featuredImage.files[0]
            },
            submit () {
                let formData = new FormData();

                formData.append('title', this.form.title)
                formData.append('author', this.form.author)
                formData.append('publisher', this.form.publisher)
                formData.append('language', this.form.language.id)
                formData.append('description', this.form.description)
                formData.append('genres', this.processSelect(this.form.genres))
                formData.append('topics', this.processSelect(this.form.topics))
                formData.append('image', this.form.image)

                this.addBook(formData).then(() => {
                    this.$toastr('success', 'Success', 'Successfully added book.')
                    this.$router.push({name: 'books'})
                })
            },
            processSelect(items) {
                let itm = []
                items.forEach((item) => {
                    itm.push(item.id)
                })

                return JSON.stringify(itm)
            }
        },
        created () {
            this.getLanguages()
            this.getGenres()
            this.getTopics()
        }
    }
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style scoped>

</style>
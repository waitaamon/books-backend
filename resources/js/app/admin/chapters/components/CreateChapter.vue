<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">New Chapter</div>
                    <div class="card-body">
                        <form method="post" @submit.prevent="submit" >
                            <div class="form-group">
                                <label for="title" class="control-label mb-1">Title</label>
                                <input id="title" type="text" class="form-control" aria-required="true" aria-invalid="false" v-model="form.title">
                                <small class="text-danger" v-if="errors.title">{{errors.title[0]}}</small>
                            </div>
                            <div class="form-group">
                                <label for="sub_title" class="control-label mb-1">Sub title</label>
                                <input id="sub_title" type="text" class="form-control" aria-required="true" aria-invalid="false" v-model="form.sub_title">
                                <small class="text-danger" v-if="errors.sub_title">{{errors.sub_title[0]}}</small>
                            </div>
                            <div class="mt-5 pt-5">
                                <tinymce id="editor" v-model="form.body"></tinymce>
                                <small class="text-danger" v-if="errors.body">{{errors.body[0]}}</small>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-info">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import tinymce from 'vue-tinymce-editor'
    import {mapGetters, mapActions} from 'vuex'
    export default {
        name: 'create-chapter',
        components: {
            tinymce
        },
        data() {
            return {
                form: {
                    title: '',
                    sub_title: '',
                    body: '',
                    is_live: false,
                    book_id: this.$route.query.ref
                }
            }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors'
            })
        },
        methods: {
            ...mapActions({
                addChapter: 'chapter/addChapter'
            }),
            submit () {
                console.log(this.form)
                this.addChapter(this.form)
                    .then(() => {
                        this.$toastr('success', 'Successfully added chapter.')
                    })
            }
        }
    }
</script>

<style scoped>

</style>
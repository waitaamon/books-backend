<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card pb-5">
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
                            <div class="form-group">
                                <label for="order" class="control-label mb-1">Chapter number</label>
                                <input id="order" type="number" class="form-control" aria-required="true" aria-invalid="false" v-model="form.order">
                                <small class="text-danger" v-if="errors.order">{{errors.order[0]}}</small>
                            </div>
                            <div class="form-group">
                                <label for="body" class="control-label mb-1">Body</label>
                               <!-- <textarea id="body" cols="30" class="form-control" v-model="form.body"></textarea>-->
                                <tinymce id="body" v-model="form.body"></tinymce>
                                <small class="text-danger" v-if="errors.body">{{errors.body[0]}}</small>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="h5=6 display-5 mb-2">Publish?</h6>
                                    <label class="switch switch-3d switch-primary mr-3">
                                        <input type="checkbox" class="switch-input" v-model="form.is_live">
                                        <span class="switch-label"></span>
                                        <span class="switch-handle"></span>
                                    </label>
                                </div>
                                <div class="col-6 text-right">
                                    <button type="submit" class="btn btn-info">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'
    import tinymce from 'vue-tinymce-editor'
    export default {
        name: 'create-chapter',
        components: {
            tinymce
        },
        data() {
            return {
                form: {
                    action: 'create',
                    title: '',
                    sub_title: '',
                    order: '',
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
                this.addChapter(this.form)
                    .then(() => {
                        this.$toastr('success', 'Successfully added chapter.')
                        this.$router.replace({name: 'showBook', query: { ref: this.form.book_id}})
                    })
            }
        }
    }
</script>

<style scoped>

</style>
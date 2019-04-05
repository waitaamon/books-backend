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
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'create-chapter',
        data() {
            return {
                form: {
                    title: '',
                    sub_title: '',
                    body: '',
                    is_live: false
                }
            }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors'
            })
        },
        methods: {
            ...mapActions({})
        }
    }
</script>

<style scoped>

</style>
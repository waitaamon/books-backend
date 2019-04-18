<template>
    <form @submit.prevent="submit">
        <div class="form-row align-items-center">
            <div class="col-sm-8 my-1">
                <label class="sr-only" for="title">Title</label>
                <input type="text" class="form-control mb-2" id="title" v-model="form.title" placeholder="Enter title">
                <small v-if="errors.title" class="help-block text-danger text-sm-left">{{ errors.title[0]}}</small>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-secondary mb-2">Add</button>
            </div>
        </div>
    </form>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'create-genre',
        data() {
            return {
                form: {
                    title: ''
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
                addGenre: 'genre/addGenre'
            }),
            submit () {
                this.addGenre(this.form)
                    .then(() => {
                        this.$toastr('success', 'Genre successfully added')
                    })
            }
        }
    }
</script>

<style scoped>

</style>
<template>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h4 class="h4">Languages</h4>
                    <button class="btn btn-outline-secondary" @click="showAdd = !showAdd">{{ showAdd ? 'Close' : 'Add Language'}}</button>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row" v-show="showAdd">
                            <div class="col-12">
                                <create-language></create-language>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-2" v-for="language in languages">
                                <button type="button" class="btn btn-outline-primary">
                                    {{language.title}} <span class="badge badge-danger" @click="deleteLanguage(language)"><i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'
    import CreateLanguage from "./CreateLanguage";

    export default {
        name: 'language-page',
        components: {CreateLanguage},
        data() {
            return {
                showAdd: false
            }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                languages: 'language/languages'
            })
        },
        methods: {
            ...mapActions({
                getLanguages: 'language/getLanguages',
                deleteLanguage: 'language/deleteLanguage'
            }),
        },
        created () {
            this.getLanguages()
        }
    }
</script>

<style scoped>

</style>
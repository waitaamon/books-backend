<template>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h4 class="h4">Genres</h4>
                    <button class="btn btn-outline-secondary" @click="showAdd = !showAdd">{{ showAdd ? 'Close' : 'Add Genre'}}</button>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row" v-show="showAdd">
                            <div class="col-12">
                                <create-genre></create-genre>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-4 col-md-2" v-for="genre in genres">
                                <button type="button" class="btn btn-outline-primary">
                                    {{genre.title}} <span class="badge badge-danger" @click="deleteGenre(genre)"><i class="fa fa-times"></i></span>
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
    import CreateGenre from "./CreateGenre";

    export default {
        name: 'genre-modal',
        components: {CreateGenre},
        data() {
            return {
                showAdd: false
            }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                genres: 'genre/genres'
            })
        },
        methods: {
            ...mapActions({
                getGenres: 'genre/getGenres',
                deleteGenre: 'genre/deleteGenre'
            }),
        },
        created () {
            this.getGenres()
        }
    }
</script>

<style scoped>

</style>
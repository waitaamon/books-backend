<template>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h4 class="h4">Gallery</h4>
                    <button class="btn btn-outline-info" @click="showImage = !showImage ">{{ showImage ? 'close' : 'add image'}}</button>
                </div>
            </div>
        </div>
        <div class="row mb-5" v-if="showImage">
            <div class="col-md-12">
                <create-image v-on:image-uploaded="updateImageStatus"></create-image>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row text-center text-lg-left">
                            <div class="col-lg-3 col-md-4 col-6" v-for="image in images">
                                <a href="#" class="d-block mb-4 h-100" v-clipboard="image.url" v-clipboard:success="clipboardSuccessHandler">
                                    <img class="img-fluid img-thumbnail" :src="image.thumbnail" alt="" >
                                </a>
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
    import CreateImage from "./CreateImage";

    export default {
        name: 'gallery-page',
        components: {CreateImage},
        data() {
            return {
                showImage: false
            }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                images: 'gallery/images'
            })
        },
        methods: {
            ...mapActions({
                getImages: 'gallery/getImages'
            }),
            updateImageStatus (status) {
                this.showImage = status
            },
            clipboardSuccessHandler ({ value, event }) {
                this.$toastr('success', 'copied image url')
            },
        },
        created() {
            this.getImages()
        }
    }
</script>

<style scoped>

</style>
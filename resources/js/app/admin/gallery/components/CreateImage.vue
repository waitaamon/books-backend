<template>
    <div class="card">
        <div class="card-body">
            <form @submit.prevent="submit">
                <div class="form-group">
                    <label for="image" class=" form-control-label">image</label>
                    <input type="file" id="image" class=" form-control form-control-file" ref="galleryImage" @change="addImage">
                    <small v-if="errors.image" class="help-block text-danger text-sm-left">{{ errors.image[0]}}</small>
                </div>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
            </form>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'create-image',
        data() {
            return {
                image: ''
            }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors'
            })
        },
        methods: {
            ...mapActions({
                addGallery: 'gallery/addImage'
            }),
            addImage() {
                this.image = this.$refs.galleryImage.files[0]
            },
            submit () {
                let formData = new FormData()
                formData.append('image', this.image)

                this.addGallery(formData).then(() => {
                    this.image = ''
                    this.$toastr('success','Successfully added image.')
                    this.$emit('imageUploaded', false)
                })
            }
        }
    }
</script>

<style scoped>

</style>
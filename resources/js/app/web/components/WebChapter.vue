<template>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-sm-10  offset-1">
                    <div class="section-row">
                        <h3 class="text-center">{{ chapter.title }}</h3>
                        <p class="font-italic text-secondary text-center">{{ chapter.sub_title }}</p>
                        <span class="mt-5" v-html="chapter.body"></span>
                    </div>
                    <div class="section-row">
                        <div class="col-sm-12">
                            <router-link :to="{name: 'webBook', query: {ref: chapter.book_id}}" class="primary-button">Back</router-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'web-chapter',
        data() {
            return {}
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                chapter: 'web/chapter'
            })
        },
        methods: {
            ...mapActions({
                getChapter: 'web/getChapter'
            })
        },
        created() {
            this.getChapter(this.$route.query.ref)
        }
    }
</script>

<style scoped>

</style>
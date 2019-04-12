<template>
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 pt-5 pb-5">
                <h3 class="text-center">{{ chapter ? chapter.title: '' }}</h3>
                <p class="font-italic text-secondary text-center">{{ chapter ? chapter.sub_title : ''}}</p>
                <span class="mt-5" v-html="chapter ? chapter.body: ''"></span>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'template-name',
        data() {
            return {}
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                chapter: 'mobile/chapter'
            })
        },
        methods: {
            ...mapActions({
                getChapter: 'mobile/getChapter'
            })
        },
        created () {
            this.getChapter(this.$route.params.chapterId)
        }
    }
</script>

<style scoped>

</style>
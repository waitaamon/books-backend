<template>
    <p>{{ chapter }}</p>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'edit-page',
        data() {
            return {}
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                chapter: 'chapter/chapter'
            })
        },
        methods: {
            ...mapActions({
                getChapter: 'chapter/getChapter'
            })
        },
        created() {
            this.getChapter(this.$route.query.ref)
        }
    }
</script>

<style scoped>

</style>
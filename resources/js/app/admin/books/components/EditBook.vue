<template>
    <div class="container-fluid">

    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    export default {
        name: 'edit-book',
        data () {
            return {}
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
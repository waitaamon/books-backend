<template>
    <div>
        <web-header></web-header>
        <router-view></router-view>
        <web-footer></web-footer>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from 'vuex'
    import WebHeader from './partials/WebHeader'
    import WebFooter from './partials/WebFooter'

    export default {
        name: 'unauthenticated-view',
        components: {WebFooter, WebHeader},
        data() {
            return {}
        },
        computed: {
            ...mapGetters({})
        },
        methods: {
            ...mapActions({})
        }
    }
</script>

<style scoped>

</style>
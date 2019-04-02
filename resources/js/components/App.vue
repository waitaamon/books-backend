<template>
    <div>
        <authenticated-view v-if="authenticated"></authenticated-view>
        <unauthenticated-view v-else></unauthenticated-view>
    </div>
</template>

<script>
    import AuthenticatedView from "./AuthenticatedView"
    import UnauthenticatedView from "./UnauthenticatedView"
    import { mapGetters } from 'vuex'
    export default {
        name: 'app',
        components: {UnauthenticatedView, AuthenticatedView},
        computed: {
            ...mapGetters({
                authenticated: 'auth/authenticated'
            })
        }
    }
</script>

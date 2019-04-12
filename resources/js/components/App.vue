<template>
    <div>
        <div v-if="!mobileView">
            <authenticated-view v-if="authenticated"></authenticated-view>
            <unauthenticated-view v-else></unauthenticated-view>
        </div>
        <div v-else>
            <mobile-view></mobile-view>
        </div>
    </div>

</template>

<script>
    import AuthenticatedView from "./AuthenticatedView"
    import UnauthenticatedView from "./UnauthenticatedView"
    import { mapGetters } from 'vuex'
    import MobileView from "./MobileView";
    export default {
        name: 'app',
        components: {MobileView, UnauthenticatedView, AuthenticatedView},
        computed: {
            ...mapGetters({
                authenticated: 'auth/authenticated',
                mobileView: 'mobileView'
            })
        }
    }
</script>

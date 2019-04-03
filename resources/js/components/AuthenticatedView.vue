<template>
    <div>
        <app-header></app-header>
        <app-sidebar></app-sidebar>
        <div class="page-container">
            <header-desktop></header-desktop>
            <div class="main-content">
                <div class="section__content section__content--p30">

                    <router-view></router-view>

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Blac books. All rights reserved.</p>
                                </div>
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
    import AppHeader from './partials/AppHeader'
    import AppSidebar from './partials/AppSidebar'
    import HeaderDesktop from './partials/HeaderDesktop'

    export default {
        name: 'authenticated-view',
        components: {HeaderDesktop, AppHeader, AppSidebar},
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

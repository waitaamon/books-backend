<template>
    <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo">
            <router-link to="/admin/dashboard">
                <img src="/images/logo2.png" alt="Cool Admin" />
            </router-link>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
                    <li>
                        <router-link to="/admin/dashboard"><i class="fas fa-tachometer-alt"></i>Dashboard</router-link>
                    </li>
                    <li>
                        <router-link to="/admin/books"><i class="fas fa-chart-bar"></i>Books</router-link>
                    </li>
                    <li>
                        <router-link to="/admin/gallery">
                            <i class="fas fa-table"></i>Gallery</router-link>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'app-sidebar',
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
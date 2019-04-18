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
                        <router-link to="/admin/dashboard"><i class="fas fa-grip-horizontal"></i>Dashboard</router-link>
                    </li>
                    <li>
                        <router-link to="/admin/books">
                            <i class="fas fa-book-open"></i>Books</router-link>
                    </li>
                    <li>
                        <router-link to="/admin/gallery">
                            <i class="fas fa-images"></i>Gallery</router-link>
                    </li>
                    <li>
                        <router-link to="/admin/genres">
                            <i class="far fa-list-alt"></i>Genres</router-link>
                    </li>
                    <li>
                        <router-link to="/admin/topics">
                            <i class="fab fa-black-tie"></i>Topics</router-link>
                    </li>
                    <li>
                        <router-link to="/admin/languages">
                            <i class="fas fa-autoprefixer"></i>Languages</router-link>
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
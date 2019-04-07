<template>
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="#">
                        <img src="/images/logo2.png" alt="Blac books" />
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li class="has-sub">
                        <a href="#">
                            <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fas fa-chart-bar"></i>Books</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fas fa-table"></i>Gallery</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'app-header',
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
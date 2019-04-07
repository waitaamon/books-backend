<template>
    <header id="header">
        <div id="nav">
            <div id="nav-top">
                <div class="container">
                    <ul class="nav-social">
                        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    </ul>

                    <div class="nav-logo">
                        <router-link to="/" class="logo"><img src="/images/logo.png" alt=""></router-link>
                    </div>
                    <div class="nav-btns">
                        <button class="aside-btn"><i class="fa fa-bars"></i></button>
                        <button class="search-btn"><i class="fa fa-search"></i></button>
                        <button class="login-btn"><i class="fas fa-sign-in-alt" @click="login"></i></button>
                        <div id="nav-search">
                            <form @submit.prevent="search">
                                <input class="input" name="search" placeholder="Enter your search...">
                            </form>
                            <button class="nav-close search-close">
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="nav-aside">
                <ul class="nav-aside-menu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contacts</a></li>
                </ul>
                <button class="nav-close nav-aside-close"><span></span></button>
            </div>
        </div>
    </header>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'web-header',
        data() {
            return {}
        },
        computed: {
            ...mapGetters({})
        },
        methods: {
            ...mapActions({}),
            login() {
                this.$router.replace({name: 'login'})
            },
            search () {
                console.log('search')
            }
        }
    }
</script>

<style scoped>

</style>
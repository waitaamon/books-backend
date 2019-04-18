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
                        <router-link to="/login" class="mt-5"><i class="fas fa-sign-in-alt mt-3"></i></router-link>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    import {mapActions} from 'vuex'

    export default {
        name: 'web-header',
        data() {
            return {}
        },
        methods: {
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
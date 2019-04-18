<template>
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <form class="form-header" action="" method="POST">
                    </form>
                    <div class="header-button">
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="content">
                                    <p class="">{{ user.name }} &nbsp;&nbsp; <i class="fas fa-sign-out-alt" @click="signout"></i></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'header-desktop',
        data() {
            return {}
        },
        computed: {
            ...mapGetters({
                user: 'auth/user'
            })
        },
        methods: {
            ...mapActions({
                logout: 'auth/logout'
            }),
            signout() {
                this.logout()
                    .then (() => {
                        window.location.href = '/'
                    })
            }
        }
    }
</script>

<style scoped>

</style>
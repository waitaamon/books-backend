<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-5">overview</h2>
                </div>
            </div>
        </div>
        <div class="row m-t-25">
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-book"></i>
                            </div>
                            <div class="text pb-4">
                                <h2>{{ stats ? stats.books_count: 0}}</h2>
                                <span>books</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-thumb-up"></i>
                            </div>
                            <div class="text pb-4">
                                <h2>{{ stats ? stats.published_books_count: 0}}</h2>
                                <span>published</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-thumb-down"></i>
                            </div>
                            <div class="text pb-4">
                                <h2>{{ stats ? stats.unpublished_books_count: 0}}</h2>
                                <span>unpublished</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c4">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text pb-4">
                                <h2>{{ stats ? stats.users_count: 0}}</h2>
                                <span>users</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-t-25">
            <div class="col-sm-6">
                <router-link :to="{name: 'create-book'}" class="btn btn-primary btn-block">CREATE NEW BOOK</router-link>
            </div>
            <div class="col-sm-6">
                <router-link :to="{name: 'gallery'}" class="btn btn-info btn-block">GALLERY</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'

    export default {
        name: 'dashboard',
        data() {
            return {}
        },
        computed: {
            ...mapGetters({
                stats: 'dashboard/stats'
            })
        },
        methods: {
            ...mapActions({
                getPrerequisites: 'dashboard/getPrerequisites'
            })
        },
        created () {
            this.getPrerequisites()
        }
    }
</script>

<style scoped>

</style>
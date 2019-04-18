<template>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h4 class="4">Topics</h4>
                    <button class="btn btn-outline-secondary" @click="showAdd = !showAdd">{{ showAdd ? 'Close' : 'Add Topic'}}</button>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row" v-show="showAdd">
                            <div class="col-12">
                                <create-topic></create-topic>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-2" v-for="topic in topics">
                                <button type="button" class="btn btn-outline-primary">
                                    {{topic.title}} <span class="badge badge-danger" @click="deleteTopic(topic)"><i class="fa fa-times"></i></span>
                                </button>
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
    import CreateTopic from "./CreateTopic";

    export default {
        name: 'topic-page',
        components: {CreateTopic},
        data() {
            return {
                showAdd: false
            }
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                topics: 'topic/topics'
            })
        },
        methods: {
            ...mapActions({
                getTopics: 'topic/getTopics',
                deleteTopic: 'topic/deleteTopic'
            }),
        },
        created () {
            this.getTopics()
        }
    }
</script>

<style scoped>

</style>
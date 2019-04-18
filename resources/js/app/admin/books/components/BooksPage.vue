<template>
    <div class="container-fluid">
        <div class="row mb-5">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h4 class="h4">Books</h4>
                    <router-link class="au-btn au-btn-icon au-btn--blue" to="/admin/book/create"><i class="zmdi zmdi-plus"></i>add Book</router-link>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="top-campaign" v-if="books.length > 0">
                    <div id="app" class="container">
                        <vuetable ref="vuetable"
                                  :api-mode="false"
                                  :fields="fields"
                                  :per-page="perPage"
                                  :css="css.table"
                                  :data-manager="dataManager"
                                  pagination-path="pagination"
                                  @vuetable:pagination-data="onPaginationData"
                        >
                            <div slot="actions" slot-scope="props">
                                <button class="btn btn-sm btn-success" @click="viewBook(props.rowData)">
                                    <i class="far fa-eye"></i>
                                </button>
                                <button class="btn btn-sm btn-primary" @click="onActionClicked('edit', props.rowData)">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" @click="onActionClicked('delete', props.rowData)">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </vuetable>
                        <div class="pt-5">
                            <vuetable-pagination ref="pagination" :css="css.pagination" @vuetable-pagination:change-page="onChangePage"></vuetable-pagination>
                        </div>
                    </div>
                </div>
                <p v-else class="text-center">No Books.</p>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'
    import Vuetable from 'vuetable-2'
    import VuetableFieldHandle from 'vuetable-2/src/components/VuetableFieldHandle.vue'
    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination'
    import CssForBootstrap4 from '../../../../utils/VuetableCssBootstrap4.js'

    export default {
        name: 'books-page',
        components: {
            Vuetable,
            VuetablePagination
        },
        data() {
            return {
                fields: [
                    {
                        name: VuetableFieldHandle
                    },
                    {
                        name: 'title',
                        sortField: 'title'
                    },
                    {
                        name: 'author',
                        sortField: 'author'
                    },
                    {
                        name: 'is_live',
                        title: 'Published',
                        formatter: (value) => {
                            return value ===  1 ?  'True' : 'False'
                        }
                    },
                    'actions'
                ],
                perPage: 3,
                css: CssForBootstrap4
            }
        },
        watch: {
            books: function(newVal, oldVal) {
                if(this.$refs.vuetable) {
                    this.$refs.vuetable.refresh();
                }
            }
        },
        computed: {
            ...mapGetters({
                books: 'book/books'
            })
        },
        methods: {
            ...mapActions({
                getBooks: 'book/getBooks',
                setBook: 'book/setBook',
                deleteBook: 'book/deleteBook'
            }),
            onPaginationData(paginationData) {
                this.$refs.pagination.setPaginationData(paginationData);
            },
            onChangePage(page) {
                this.$refs.vuetable.changePage(page);
            },
            dataManager(sortOrder, pagination) {
                if (this.books.length < 1) return;

                let local = this.books;

                // sortOrder can be empty, so we have to check for that as well
                if (sortOrder.length > 0) {
                    console.log("orderBy:", sortOrder[0].sortField, sortOrder[0].direction);
                    local = _.orderBy(
                        local,
                        sortOrder[0].sortField,
                        sortOrder[0].direction
                    );
                }

                pagination = this.$refs.vuetable.makePagination(
                    local.length,
                    this.perPage
                );

                let from = pagination.from - 1;
                let to = from + this.perPage;

                return {
                    pagination: pagination,
                    data: _.slice(local, from, to)
                };
            },
            viewBook(data) {
                this.$router.push({name: 'showBook',  query: { ref: data.id, token: data.slug } })
            },
            onActionClicked(action, data) {
               if(action === 'edit') {
                    this.$router.replace({name: 'editBook', query: {ref: data.id}})
               } else if(action === 'delete') {
                   this.deleteBook(data.id)
               }
            }
        },
        created() {
            this.getBooks()
        }
    }
</script>

<style scoped>

</style>
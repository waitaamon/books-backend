<template>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="h3 text-center">{{ book ? book.title : ''}}</h3>
                    <p class="text-center"><strong>Author: &nbsp;</strong> {{ book ? book.author : '' }} &nbsp;&nbsp;<strong>Published On: &nbsp;</strong> {{ book ? book.published_on : '' }} </p>
                </div>
            </div>
            <div class="section-row">
                <div class="section-title">
                    <h3 class="title">Chapters</h3>
                </div>
                    <ol v-if="book" class="list-style">
                        <li v-for="chapter in book.chapters" class="mb-2">
                            <p><router-link :to="{name: 'webChapter', query: { ref: chapter.id, v: chapter.slug }}">{{ chapter.title }}</router-link></p>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex'
    export default {
        name: 'web-book',
        data() {
            return {}
        },
        computed: {
            ...mapGetters({
                errors: 'getValidationErrors',
                book: 'web/book'
            })
        },
        methods: {
            ...mapActions({
                getBook: 'web/getBook'
            })
        },
        created() {
            this.getBook(this.$route.query.ref)
        }
    }
</script>

<style scoped lang="scss">
    $padding-base: 15px;
    $color-body: #fff;
    $color-border: #ddd;
    $color-link: #0275d8;
    $border-radius: .25rem;

    .nav-tabs {
        &--vertical {
            border-bottom: none;
            border-right: 1px solid $color-border;
            display: flex;
            flex-flow: column nowrap;
        }

        &--left {
            margin: 0 $padding-base;

            .nav-item + .nav-item {
                margin-top: .25rem;
            }

            .nav-link {
                transition: border-color .125s ease-in;
                white-space: nowrap;

                &:hover {
                    background-color: lighten($color-border, 10%);
                    border-color: transparent;
                }
            }

            .nav-link.active {
                border-bottom-color: $color-border;
                border-right-color: $color-body;
                border-bottom-left-radius: $border-radius;
                border-top-right-radius: 0;
                margin-right: -1px;

                &:hover {
                    background-color: $color-body;
                    border-color: $color-link $color-body $color-link $color-link;
                }
            }
        }
    }
</style>
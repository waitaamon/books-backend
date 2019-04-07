<template>
  <div>
    <homepage-featured></homepage-featured>
    <all-books></all-books>
  </div>
</template>

<script>
  import {mapActions} from 'vuex'
  import HomepageFeatured from './partials/HomepageFeatured'
  import AllBooks from './partials/AllBooks'

  export default {
    name: 'home-page',
    components: {AllBooks, HomepageFeatured},
    data() {
      return {}
    },
    methods: {
      ...mapActions({
        getBooks: 'web/getBooks'
      })
    },
    created () {
      this.getBooks()
    }
  }
</script>

<style scoped>

</style>

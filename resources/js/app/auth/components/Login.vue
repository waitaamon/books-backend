<template>
    <div class="section mt-5 mb-5">
        <div class="container">
            <div class="row mt-3 mb-3">
                <div class="col-sm-8 offset-sm-2 text-center">
                    <h3 class="h3">LOGIN</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="alert alert-danger alert-dismissible" v-if="errors.root">
                        {{ errors.root[0] }}
                    </div>
                    <form @submit.prevent="submit">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="input" type="email" placeholder="Email" v-model="form.email">
                                    <small class="text-danger" v-if="errors.email">{{ errors.email[0] }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input class="input" type="password" v-model="form.password" placeholder="Password">
                                    <small class="text-danger" v-if="errors.password">{{ errors.password[0] }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button class="primary-button">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
  import {mapGetters, mapActions} from 'vuex'
  export default {
    name: 'login-page',
    data() {
      return {
          form: {
              email: '',
              password: ''
          }
      }
    },
    computed: {
      ...mapGetters({
          errors: 'getValidationErrors'
      })
    },
    methods: {
      ...mapActions({
          'login': 'auth/login'
      }),
        submit() {
            this.login(this.form)
                .then(() => {
                    window.location.href = '/admin/dashboard'
                })
        }
    }
  }
</script>

<style scoped>

</style>

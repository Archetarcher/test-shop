<template>
  <div class="col-5 mb-5">
    <div class="card h-100">

      <div class="card-body p-4">

      <h4 class="text-muted">Login</h4>
        <div class="col-12" v-if="Object.keys(errors).length > 0">
          <div class="alert alert-danger">
            <ul class="mb-0">
              <li v-for="(value, key) in errors" :key="key">{{ value[0] }}</li>
            </ul>
          </div>
        </div>
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Email address</label>
          <input v-model="auth.email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input v-model="auth.password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" @click="login">{{ loading ? 'Loading' : 'Login'}}</button>
        <div class="text-center">
          <label>Don't have an account? <router-link :to="{name:'register'}">Register</router-link></label>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {mapActions} from 'vuex'
export default {
  name: "LoginComponent",
  data(){
    return {
      auth: {
        email: "",
        password: ""
      },
      loading: false,
      errors: {}
    }
  },
  methods:{
    ...mapActions({
      singIn: 'auth/login'
    }),
    async login(){
      let app = this;
      app.loading = true;
      await axios.get('/sanctum/csrf-cookie')
      await axios.post('/login', app.auth).then(({response}) =>{
        console.log(response)
        app.errors = {};
        app.singIn();
      }).catch(({response}) => {

        if (response.status === 422){
            app.errors = response.data.errors;
        }else{
          app.errors = {};
          console.log(response)
        }
      }).finally(() => {
        app.loading = false;
      })

    }
  }
}
</script>

<style scoped>

</style>
<template>
  <div class="col-5 mb-5">
    <div class="card h-100">

      <div class="card-body p-4">

        <h4 class="text-muted">Registration</h4>
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
        </div>
        <div class="mb-3">
          <label for="exampleInputName" class="form-label">Name</label>
          <input v-model="auth.name" type="text" class="form-control" id="exampleInputName" >
        </div>
        <div class="mb-3">
          <label for="exampleInputPhone" class="form-label">Phone</label>
          <input v-model="auth.phone" type="text" class="form-control" id="exampleInputPhone" >
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input v-model="auth.password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword2" class="form-label">Confirm password</label>
          <input v-model="auth.password_confirmation" type="password" class="form-control" id="exampleInputPassword2">
        </div>
        <button type="submit" class="btn btn-primary" @click="register">{{ loading ? 'Loading' : 'Register'}}</button>
        <div class="text-center">
          <label>Already have an account? <router-link :to="{name:'login'}">Login</router-link></label>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {mapActions} from 'vuex'
export default {
  name: "RegisterComponent",
  data(){
    return {
      auth: {
        name:"",
        email: "",
        phone: "",
        password: "",
        password_confirmation: "",
      },
      loading: false,
      errors: {},
    }
  },
  methods:{
    ...mapActions({
      singIn: 'auth/login'
    }),
    async register(){
      let app = this;
      app.loading = true;
      await axios.get('/sanctum/csrf-cookie')
      await axios.post('/register', app.auth).then(({data}) =>{
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
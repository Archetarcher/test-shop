<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
      <router-link class="navbar-brand" :to="{name:'shop'}" >Shop</router-link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">


          <li class="nav-item">
            <router-link class="nav-link active" :to="{name:'shop'}" >Home</router-link>

          </li>
        </ul>
        <div class="d-flex">

          <router-link :to="{name:'cart'}" class="btn btn-outline-dark" >
            <i class="bi-cart-fill me-1"></i>
            Cart
            <span class="badge bg-dark text-white ms-1 rounded-pill">{{$store.state.cart.count}}</span>
          </router-link>
        </div>

          <div v-if="Object.keys($store.state.auth.user).length > 0" class="ms-2 dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$store.state.auth.user.name}}</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>
                <router-link :to="{name:'orders'}" class="dropdown-item"  >

                  Orders
                </router-link>
              </li>
              <li>
                <a href="javascript:void(0)" @click="logout" class="dropdown-item" >
                  Logout
                </a>
              </li>
            </ul>
          </div>
        <div v-else>
          <router-link :to="{name:'login'}" class="btn " >
            Login
          </router-link>
          <router-link :to="{name:'register'}" class="btn ">
            register
          </router-link>
        </div>
      </div>
    </div>
  </nav>

</template>

<script>
import {mapActions} from "vuex";
export default {
  name: "NavComponent",
  mounted() {
  },

  methods: {
    ...mapActions({
      'signOut': 'auth/logout'
    }),
    async logout(){
      let app = this;

      await axios.post('/logout').then(({data})=> {
        app.signOut()
        app.$router.push({ name : 'login'})
      })
    },
    orders(){

    }
  }
}
</script>

<style scoped>

</style>
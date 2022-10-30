<template>
  <div class="col-10 mb-5">
    <div class="card h-100">

      <div class="card-body p-4">

          <div class="row">
            <div class="col-6">
              <h4 class="text-muted">Confirm Order</h4>
              <div class="col-12" v-if="Object.keys(errors).length > 0">
                <div class="alert alert-danger">
                  <ul class="mb-0">
                    <li v-for="(value, key) in errors" :key="key">{{ value[0] }}</li>
                  </ul>
                </div>
              </div>
              <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input v-model="order.name" type="text" class="form-control" id="Name" aria-describedby="Name">
              </div>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input v-model="order.email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPhone" class="form-label">Phone</label>
                <input v-model="order.phone" type="email" class="form-control" id="exampleInputPhone" aria-describedby="emailHelp">
              </div>

                <div class=" text-end font-monospace">
                  <h5 class="  text-muted">Total: $<span>{{total}}</span></h5>
                  <button :disabled="total===0" type="submit" class="btn btn-primary" @click="submit">{{ loading ? 'Loading' : 'Submit'}}</button>

                </div>


            </div>

            <div class="col-6">
              <p v-if="products.length===0" class="text-muted text-center">Cart is empty!</p>
              <div class="bg-opacity-10 bg-success p-2 rounded d-flex justify-content-between m-1 text-muted" v-for="product of products">
                <span class="text-success">${{product.cost*product.count.toLocaleString()}}</span>
                {{product.title + "($" + product.cost + " x " + product.count + ")"}}
                <button @click="remove(product)" class="btn btn-close"></button>
              </div>

            </div>
          </div>
        </div>
    </div>
  </div>

</template>

<script>
import {mapActions} from "vuex";
import router from "../../router";

export default {
  name: "CartComponent",
  computed:{
    products (){
      return this.$store.state.cart.products;
    },
    total(){
      let sum = 0;
      this.$store.state.cart.products.forEach(data => {
        sum+= (data.cost*data.count)
      })
      return sum;
    }
  },
  data(){
    return {
      errors: {},
      loading: false,
      order: {
        name: '',
        email: '',
        phone: '',
        user_id: null,
        sum: '',
        products: []
      }
    }
  },
  mounted() {
    const user = this.$store.state.auth.user;
    if (Object.keys(user).length > 0){
      this.order = {
        email: user.email,
        phone: user.phone,
        user_id: user.id,
      }
    }


  },
  methods:{
    ...mapActions({
      removeFromCart: 'cart/removeFromCart',
    }),
    async submit(){
      let app = this;
      app.loading = true;
      app.order.sum = app.total;
      app.order.products = app.products;

      await axios.post('/api/orders/confirm', app.order).then(({response}) =>{
        router.push({name:'shop'})
        app.errors = {};
      }).catch(({response}) => {
        console.log(response)
        if (response.status === 422){
          app.errors = response.data.error;
        }else{
          app.errors = {};
          console.log(response)
        }
      }).finally(() => {
        app.loading = false;
      })

    },
    remove(product){
      this.removeFromCart(product.id)
    }
  }
}
</script>

<style scoped>

</style>
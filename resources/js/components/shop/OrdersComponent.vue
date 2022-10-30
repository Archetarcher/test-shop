<template>
<div>
  <table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Sum</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <tr v-for="order of orders">
      <th scope="row">{{order.id}}</th>
      <td>{{order.name}}</td>
      <td>{{order.email}}</td>
      <td>{{order.phone}}</td>
      <td>${{order.sum}}</td>
      <td><router-link :to="{name: 'products', params: {id: order.id}}" class="btn btn-primary">Products</router-link></td>
    </tr>

    </tbody>
  </table></div>
</template>

<script>
export default {
  name: "OrdersComponent",
  data(){
    return {
      orders: []
    }
  },
  mounted() {
    this.getOrders();
  },
  methods: {
    async getOrders() {
      let app = this;
      await axios.get('/api/orders/user', ).then(({data}) => {
        app.orders = data.data.body
      });
    }
  }
}
</script>

<style scoped>

</style>
<template>
<div><table class="table">
  <thead>
  <tr>
    <th scope="col">#</th>
    <th scope="col">Title</th>
    <th scope="col">Description</th>
    <th scope="col">Cost</th>
    <th scope="col">Count</th>
    <th scope="col">Total</th>
  </tr>
  </thead>
  <tbody>
  <tr v-for="product of products">
    <th scope="row">{{product.product.id}}</th>
    <td>{{product.product.title}}</td>
    <td>{{product.product.description}}</td>
    <td>${{product.product.cost}}</td>
    <td>{{product.count}}</td>
    <td>${{product.count*product.product.cost}}</td>
  </tr>

  </tbody>
</table></div>
</template>

<script>
export default {
  name: "OrderProductsComponent",
  data(){
    return {
      products: []
    }
  },
  mounted() {
    this.getProducts();
  },
  methods: {
    async getProducts() {
      let app = this;


      await axios.get('/api/orders/products', {params: {order_id: app.$route.params.id}}).then(({data}) => {
        app.products = data.data.body
      });
    }
  }
}
</script>

<style scoped>

</style>
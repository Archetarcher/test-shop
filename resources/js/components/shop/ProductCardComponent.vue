<template>


  <div class="col mb-5">
    <div class="card h-100">
      <!-- Product image-->
      <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
      <!-- Product details-->
      <div class="card-body p-4">
        <div class="text-center">
          <!-- Product name-->
          <h5 class="fw-bolder">{{ product.title }}</h5>
          <!-- Product price-->
          ${{product.cost}}
          <p class="text-muted">{{product.description}}</p>
        </div>
      </div>
      <!-- Product actions-->
      <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
        <div class="text-center">
          <a  class="btn btn-danger mt-auto" @click="removeP(product)" href="javascript:void(0)">-</a>
          {{product.count}}
          <a  class="btn btn-outline-dark mt-auto" @click="addToCart(product)" href="javascript:void(0)">+</a>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
import {mapActions} from "vuex";
import store from "../../store";

export default {
  name: "ProductCardComponent",
  props: {
    product: Object
  },
  methods:{
    ...mapActions({
      addProduct: 'cart/addProduct',
      removeProduct: 'cart/removeProduct',
    }),
    addToCart(product){
      this.addProduct(product);
      product.count++


    },
    removeP(product){
      this.removeProduct(product.id)
      if (product.count > 0){
        product.count--
      }

    }
  }

}
</script>

<style scoped>

</style>
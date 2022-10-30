<template>
<div class="row">

        <div class="col-2">
          <div>
            <div class="badge bg-secondary bg-opacity-50 m-1" v-if="$store.state.filter.cost.length > 0">
              <span>${{$store.state.filter.cost[0] + " > cost < $" + $store.state.filter.cost[1]}}</span>
              <button @click="removeFilter('cost')" class="btn btn-close btn-sm btn-close-white"></button>
            </div>
           <div class="badge bg-secondary bg-opacity-50 m-1" v-if="Object.keys($store.state.filter.category).length > 0">
              <span>{{$store.state.filter.category.title}}</span>
              <button @click="removeFilter('category')" class="btn btn-close btn-sm btn-close-white"></button>
            </div>



          </div>
          <span class="text-muted" id="">Cost</span>

          <div class="input-group">

            <input v-model="from" type="text" class="form-control" placeholder="from">
            <input v-model="to" type="text" class="form-control" placeholder="to">
              <button @click="filter" class="btn btn-outline-secondary" type="button">Filter</button>
          </div>
          <category-tree-component v-for="category of categories" :category="category"></category-tree-component>

        </div>
        <div class="col-10">
          <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <product-card-component v-for="product of $store.state.filter.products" :product="product"></product-card-component>
          </div>
        </div>
    </div>
</template>

<script>
import ProductCardComponent from '@/components/shop/ProductCardComponent.vue'
import CategoryTreeComponent from '@/components/shop/CategoryTreeComponent.vue'
import {mapActions} from "vuex";


export default {
  name: "ShopComponent",
  components: {CategoryTreeComponent, ProductCardComponent},
  data(){
    return {
      products: {},
      categories: {},
      from: 0,
      to: 0
    }
  },
  mounted() {
    this.getCategories();
  },
  methods: {
    ...mapActions({
      updateProducts: 'filter/filterProducts',
      setCost: 'filter/setCost',
      setCategory: 'filter/setCategory'
    }),
    async getCategories() {
      let app = this;
      await axios.get('/api/categories').then(({data}) => {
        app.categories = data.data.body
        app.updateProducts();
      })
          .catch(({response}) => {
            console.log(response)
          })

    },
    filter(){
      console.log('filter')
      this.setCost([this.from, this.to])
      this.updateProducts();
    },
    removeFilter(type){
      if (type === 'cost'){
        this.setCost([]);
      }
      if (type === 'category'){
        this.setCategory({});
      }
      this.updateProducts();

    }
  }
}
</script>

<style scoped>

</style>
<template>

  <li class="node-tree">
    <span class="label btn" @click="changeCategory(category)">{{ category.title }}</span>

    <ul v-if="category.subcategory && category.subcategory.length">
      <category-tree-component v-for="subcategory in category.subcategory" :category="subcategory"></category-tree-component>
    </ul>
  </li>
</template>

<script>
import {mapActions} from "vuex";

export default {
  name: "CategoryTreeComponent",
  props: {
    category: Object
  },
  methods:{
    ...mapActions({
      setCategory: 'filter/setCategory',
      updateProducts: 'filter/filterProducts'
    }),
    changeCategory(category){
      this.setCategory(category);
      this.updateProducts();

    }
  }
}
</script>

<style scoped>

</style>
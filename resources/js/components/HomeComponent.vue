<template>
<div>
  <nav-component></nav-component>
  <header-component></header-component>

  <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
      <div class="row justify-content-center">

      <router-view/>
      </div>
    </div>
  </section>

 <footer-component></footer-component>
</div>
</template>

<script>
import NavComponent from '@/components/home/NavComponent.vue'
import HeaderComponent from '@/components/home/HeaderComponent.vue'
import FooterComponent from '@/components/home/FooterComponent.vue'

export default {
  name: "HomeComponent",
  components: {NavComponent, HeaderComponent, FooterComponent},
  mounted() {
    console.log('Component mountede.')
  }
}
</script>

<style scoped>

</style>
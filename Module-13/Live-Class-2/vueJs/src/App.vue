<script setup>
import Navber from './components/parts/Navber.vue';
</script>

<template>
   <h1> Module 13 || Live Class 2 </h1>
  <h2>Creating A Blog Project</h2>
  <p>
    <strong>Note: </strong>
    A dynamic blog project using vue router
  </p>

  <Navber/>

  <div class="p-6 px-24">
    <router-view></router-view>
  </div>

</template>

<style scoped>
</style>
<script setup>
</script>

<template>
  <h1> Module 13 || Live Class 1 </h1>
  <h2>Understanding Vue Router</h2>
  <p>
    <strong>Note: </strong>
    What is a vue router?,
    Workflow of vue router,
    How to setup vue router,
    Basic use case and setup of vue router,
    Vue router parent routes with examples,
    Vue router nested route with examples,
    Vue router dynamic route with examples,
  </p>
  <div class="mb-5 p-5 bg-slate-500">
    <ul class="flex justify-center">
      <li><router-link to="/" class="px-3 py-2 bg-orange-400 rounded m-1">Home</router-link></li>
      <li><router-link to="/about" class="px-3 py-2 bg-orange-400 rounded m-1">About</router-link></li>
      <li><router-link to="/blog" class="px-3 py-2 bg-orange-400 rounded m-1">Blog</router-link></li>
      <li><router-link to="/contact" class="px-3 py-2 bg-orange-400 rounded m-1">Contact</router-link></li>
    </ul>
  </div>
  <router-view></router-view>
</template>

<style scoped>

</style>
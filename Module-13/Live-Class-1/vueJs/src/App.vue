<script setup>
</script>

<template>
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
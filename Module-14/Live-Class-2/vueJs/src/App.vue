<script setup>
import NavMenu from './components/parts/NavMenu.vue';
</script>

<template>
  <NavMenu />
  <div class="p-24">
    <router-view></router-view>
  </div>
</template>

<style scoped>
</style>
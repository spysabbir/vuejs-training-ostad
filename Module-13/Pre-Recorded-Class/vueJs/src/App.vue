<script setup>
  import Navber from './components/Navber.vue'
  import LeftSideber from './components/LeftSideber.vue'
</script>

<template>

  <LeftSideber />
  <Sideber />

  <!-- <router-view></router-view> -->

  <!-- <router-view :key="$route.fullPath"></router-view> -->
  <router-view></router-view>

  <router-view name="right"></router-view>
 
</template>

<style scoped>

</style>

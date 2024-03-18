<script setup>
import Sidebar from './components/Sidebar.vue'
import Navigation from './components/Navigation.vue'
import Player from './components/Player.vue'
import engine from './data/engine';
engine.initialize()
</script>

<template>
  <h1> Module 12 || Live Class 1 </h1>
  <h2>More Data Reactivity, Working With External API</h2>

  <div class="player">
    <Navigation />
    <div class="main flex flex-row">
      <Sidebar />
      <Player />
    </div>
  </div>
</template>

<style scoped>

</style>

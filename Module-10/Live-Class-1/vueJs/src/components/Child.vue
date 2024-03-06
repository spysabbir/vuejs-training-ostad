<script setup>
defineProps(['person']);
</script>

<template>
  <div class="mx-auto w-96 bg-slate-600 p-5">
    <h1 class="mb-3 text-2xl">Child Component</h1>
    <div class="mb-3">
      <label>Name</label>
      <input class="px-1 ml-2" type="text" v-model="person.name">
    </div>
    <div class="mb-3">
      <label>Age</label>
      <input class="px-1 ml-2" type="text" v-model="person.age">
    </div>
    <div class="mb-3">
      <label>Address</label>
      <input class="px-1 ml-2" type="text" v-model="person.address">
    </div>
  </div>
</template>

<style scoped>

</style>

<script setup>
  defineProps(['name', 'age']);
</script>

<template>
  <div class="mx-auto w-96 bg-slate-600 p-5">
    <h1 class="mb-3 text-2xl">Multipole Input Component</h1>
    <div class="mb-3">
      <label>Name</label>
      <input class="px-1 ml-2" type="text" :value="name" @input="$emit('update:name', $event.target.value)">
    </div>
    <div class="mb-3">
      <label>Age</label>
      <input class="px-1 ml-2" type="text" :value="age" @input="$emit('update:age', $event.target.value)">
    </div>
  </div>
</template>

<style scoped>

</style>

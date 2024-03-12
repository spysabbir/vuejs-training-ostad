<script setup>
import Calculator from './components/Calculator.vue';
import ApiData from './components/ApiData.vue';
</script>

<template>
  <div class="mx-auto w-[1000px] bg-gray-400 p-5 rounded mt-10">
    <h1 class="text-white text-2xl text-center border-b-2 pb-2">VueJs 3 Calculator & Quote App</h1>

    <div class="mt-5 bg-slate-600 p-5 rounded">
      <Calculator />
    </div>
    
    <div class="mt-5 bg-slate-600 p-5 rounded">
      <ApiData />
    </div>

  </div>
</template>

<style scoped>

</style>

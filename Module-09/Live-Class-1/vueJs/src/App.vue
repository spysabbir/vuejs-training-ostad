<script setup>
  import { ref, onBeforeMount, onMounted, onBeforeUpdate, onUpdated } from 'vue'
  import HelloWorld from './components/HelloWorld.vue'

  onBeforeMount(() => {
    console.log('1. Parent onBeforeMount');
  })

  onMounted(() => {
    console.log('2. Parent onMounted');
  })

  onBeforeUpdate(() => {
    console.log('3. Parent onBeforeUpdate');
  })

  onUpdated(() => {
    console.log('4. Parent onUpdated');
  })

  const count = ref(0)
  const status = ref(true)
</script>

<template>
  <div class="container mx-auto">
    <div class="mb-5 mx-auto">
      <h1>Parent</h1>
      <button type="button" class="p-2 bg-indigo-500 m-1 rounded text-white" @click="count++">Count is {{ count }}</button>
    </div>
  </div>

  <div class="container mx-auto">
    <div class="mb-5 mx-auto">
      <button type="button" class="p-2 bg-indigo-500 m-1 rounded text-white" @click="status = !status">Toggle</button>
      <HelloWorld v-if="status"></HelloWorld>
    </div>
  </div>
</template>

<style scoped>

</style>

<script setup>
    import { ref, onBeforeMount, onMounted, onBeforeUpdate, onUpdated, onBeforeUnmount, onUnmounted } from 'vue'

    onBeforeMount(() => {
        console.log('1. Child onBeforeMount');
    })

    onMounted(() => {
        console.log('2. Child onMounted');
    })

    onBeforeUpdate(() => {
        console.log('3. Child onBeforeUpdate');
    })

    onUpdated(() => {
        console.log('4. Child onUpdated');
    })

    onBeforeUnmount(() => {
        console.log('5. Child onBeforeUnmount');
    })

    onUnmounted(() => {
        console.log('6. Child onUnmounted');
    })

  const count = ref(0)
</script>

<template>
    <h1>Child</h1>
    <button type="button" class="p-2 bg-indigo-500 m-1 rounded text-white" @click="count++">Count is {{ count }}</button>
</template>

<style scoped>

</style>

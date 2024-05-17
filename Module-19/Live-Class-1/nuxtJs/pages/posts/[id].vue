<script setup>
const route = useRoute()
</script>

<template>
  <div>
    <h1>Hello Single Post Page</h1>
    <p>Post ID: {{ route.params.id }}</p>
  </div>
</template>

<style scoped>

</style>
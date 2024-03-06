<script setup>
defineProps(['person']);
import SingleInput from './SingleInput.vue';
import Button from './Button.vue';
</script>

<template>
  <div class="mx-auto w-96 bg-slate-600 p-5">
    <h1 class="mb-3 text-2xl">Child With Child Component</h1>
    
    <SingleInput v-model="person.name" label="Name"/>
    <SingleInput v-model="person.age" label="Age"/>
    <SingleInput v-model="person.address" label="Address"/>

    <Button v-model:name="person.name"/>
  </div>
</template>

<style scoped>

</style>

<script setup>
  import InputComponent from './InputComponent.vue'
  const props = defineProps(['f'])

</script>

<template>
  <!-- <div class="p-3">
    <label>Name</label>
    <input type="text" v-model="person.name">
    <br><br>
    <label>Email</label>
    <input type="text" v-model="person.email">
  </div> -->

  <div class="p-3">
    <InputComponent lable="Name" v-model="person.name"/>
    <InputComponent lable="Email" v-model="person.email"/>
  </div>
</template>

<style scoped>

</style>

<script setup>
  import { ref, reactive } from 'vue';
  const persons = reactive([
    {name: "Sabbir Ahammed", age: 26, address: "BD"},
    {name: "Sovon Ahammed", age: 25, address: "US"},
    {name: "Alif Ahammed", age: 24, address: "UK"},
  ])
  const selectPerson = ref(0)
</script>

<template>
  <div class="container mx-auto">
    {{ persons }}
      <div>
        <select v-model="selectPerson">
          <option :value="index" v-for="(person, index) in persons" :key="index">{{ person.name }}</option>
        </select>
      </div>
      <div class="mt-3">
        <p>Person Details {{ selectPerson }}</p>
        <label>Name: <input type="text" v-model="persons[selectPerson].name"></label>
        <label>Age: <input type="text" v-model="persons[selectPerson].age"></label>
        <label>Address: <input type="text" v-model="persons[selectPerson].address"></label>
      </div>
  </div>
</template>

<style scoped>

</style>

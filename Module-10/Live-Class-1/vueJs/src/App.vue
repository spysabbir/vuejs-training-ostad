<script setup>
  import { reactive } from 'vue'
  import Child from './components/Child.vue'
  import SingleInput from './components/SingleInput.vue'
  import MultipoleInput from './components/MultipoleInput.vue'
  import ChildWithChild from './components/ChildWithChild.vue'

  const person = reactive({
    name: 'Sabbir Ahammed',
    age: 25,
    address: 'Dhaka, BD'
  })
</script>

<template>
   <div class="w-96 p-2 mx-auto mb-5 border text-center">
      <p>Person Name: {{ person.name }}</p>
      <p>Person Age: {{ person.age }}</p>
      <p>Person Address: {{ person.address }}</p>
    </div>

    <!-- <div class="mx-auto w-96 bg-slate-600 p-5">
      <h1 class="mb-3 text-2xl">Parent Component</h1>
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
    </div> -->

  <!-- <Child :person="person"/> -->

  <!-- <SingleInput label="Name" v-model="person.name"/> -->

  <!-- <MultipoleInput v-model:name="person.name" v-model:age="person.age"/> -->

  <ChildWithChild :person="person" />
</template>

<style scoped>

</style>

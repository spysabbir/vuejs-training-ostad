<script setup>
  // import Todo from './components/Todo.vue';
  import Reactivity from './components/Reactivity.vue'

  // const numbers = ['A', 'B', 'C', 'D', 'E']

  // const persons = {
  //   name: 'Sabbir Ahammed',
  //   age: 25,
  //   gender: 'Male',
  //   profession: 'VueJs Developer'
  // }
</script>

<template>
  <section class="container mx-auto">
    <h1> Module 05 || Live Class 1 </h1>
    <h2>Loops</h2>

    <!-- <section class="mt-10 flex space-x-3 items-center">
      <div v-for="(number, index) in numbers" :key="index" class="p-3 bg-pink-400">{{ index }}. {{ number }}</div>
    </section> -->

    <!-- <section class="mt-10">
      <Todo></Todo>
    </section> -->

    <!-- <section class="mt-10">
      <ul>
        <li class="bg-indigo-700 p-2 m-1" v-for="(value, key, index) in persons" :key="index">
          <span class="bg-green-900 p-1 m-1">{{ key }}: {{ value }}</span>
        </li>
      </ul>
    </section> -->

    <section class="mt-10">
      <Reactivity></Reactivity>
    </section>
  </section>
</template>

<style scoped>

</style>

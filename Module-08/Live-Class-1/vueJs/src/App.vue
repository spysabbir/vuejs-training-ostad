<script setup>
  import { ref, reactive } from 'vue';
  // import Edit from './components/Edit.vue';
  // import Quiz from './components/Quiz.vue';
  import Student from './components/Student.vue';

  const input = ref('Test')
  // const changeValue = (e) => {
  //   input.value = e.target.value
  // }

  const checked = ref(false)

  const checked1 = ref([])

  const redio = ref('')

  const select = ref('')
</script>

<template>
    <h1> Module 08 || Live Class 1 </h1>
    <h2>Form and Form Components</h2>
    <p>
      <strong>Note: </strong>
        Form discussion,
        Single value model,
        Object value model,
        Object value model with loop,
        Checkbox with multiple and single data,
        Simple Quiz project with radio,
        Simple select,
        Selected object edit with v-model,
        Repeater input fields,
        v-model.number,
        v-model.trim
    </p>

  <div class="container mx-auto">
    <div class="flex flex-col">
      <!-- <span>Output: {{ input }}</span> -->
      <!-- <label>Enter Your Input</label>
      <input type="text" :value="input" @input="changeValue($event)"> -->

      <!-- <label>Enter Your Input</label>
      <input type="text" v-model="input"> -->

      <!-- <span>Output: {{ checked }}</span>
      <label>Checked It</label>
      <input type="checkbox" v-model="checked"> -->

      <!-- <span>Output: {{ checked1 }}</span>
      <label>Checked It</label>
      <input type="checkbox" value="Red" v-model="checked1">Red
      <input type="checkbox" value="Green" v-model="checked1">Green -->

      <!-- <span>Output: {{ redio }}</span>
      <label>Select It Male</label>
      <input type="radio" value="Male" v-model="redio">
      <label>Select It Female</label>
      <input type="radio" value="Female" v-model="redio"> -->

      <!-- <span>Output: {{ select }}</span>
      <label>Select It</label>
      <select v-model="select" class="p-2">
        <option value="">Select</option>
        <option value="M">M</option>
        <option value="L">L</option>
        <option value="XL">XL</option>
        <option value="XXL">XXL</option>
      </select> -->
    </div>
  </div>

  <!-- <Edit></Edit> -->

  <!-- <Quiz></Quiz> -->

  <Student></Student>
</template>

<style scoped>

</style>

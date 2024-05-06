<script setup>
import { ref } from 'vue'
import Input from './components/Input.vue'
import Button from './components/Button.vue'
const name = ref('')
const email = ref('')
</script>

<template>
  <h3>Module 18 || Live Class 3</h3>
  <p>Extra Class on Creating A Reusable Component Library</p>
  <h4>Form Library Build</h4>
  <h5>Input Component</h5>
  <h5>Button Component</h5>
  
  <Input label="Name" type="text" v-model="name" placeholder="Enter your name" />
  <Input label="Email" type="email" v-model="email" placeholder="Enter your email" />
  <Button text="Submit" :url="false" />
  <Button text="Click" url="https://spysabbir.com" />
</template>

<style scoped>

</style>

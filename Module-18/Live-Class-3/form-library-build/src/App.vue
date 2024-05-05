<script setup>
import { ref } from 'vue'
import Input from './components/Input.vue'
import Button from './components/Button.vue'
const name = ref('')
const email = ref('')
</script>

<template>
  <Input label="Name" type="text" v-model="name" placeholder="Enter your name" />
  <Input label="Email" type="email" v-model="email" placeholder="Enter your email" />
  <Button text="Submit" :url="false" />
  <Button text="Click" url="https://spysabbir.com" />
</template>

<style scoped>

</style>

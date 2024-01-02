<script setup>
import { ref } from 'vue'
const x = ref(0)
const y = ref(0)
const result = ref(0)
</script>

<template>
<div>
    <input type="number" placeholder="Enter 1st Number" v-model="x">
    <input type="number" placeholder="Enter 2nd Number" v-model="y">

    <button type="button" @click="result = x + y">+</button>
    <button type="button" @click="result = x - y">-</button>
    <button type="button" @click="result = x * y">*</button>
    <button type="button" @click="result = x / y">/</button>

    <input type="number" placeholder="Showing Result" readonly v-model="result">
  </div>
</template>

<style scoped>

</style>

<script setup>
import { ref } from 'vue';

const num1 = ref('');
const num2 = ref('');
const operation = ref('+');
const result = ref(null);

const calculate = () => {
  const number1 = parseFloat(num1.value);
  const number2 = parseFloat(num2.value);

  if (!number1) {
    alert('Input 1 field Value Not Found!')
  } else if(!number2) {
    alert('Input 2 field Value Not Found!')
  } else {
    switch (operation.value) {
      case '+':
        result.value = number1 + number2;
        break;
      case '-':
        result.value = number1 - number2;
        break;
      case '*':
        result.value = number1 * number2;
        break;
      case '/':
        result.value = number1 / number2;
        break;
      default:
        result.value = null;
    }
  }
};
</script>

<template>
  <div>
    <h1 class="text-2xl text-center text-white underline mb-5">Calculator</h1>
    <div v-if="result !== null" class="m-1 bg-gray-500 p-1 rounded text-center">
      <strong>Result: {{ result }}</strong>
    </div>

    <div class="m-1 bg-zinc-600 p-1 rounded text-center">
      <input v-model="num1" class="p-2 rounded m-1" type="number" placeholder="Number 1" />

      <select v-model="operation" class="px-3 py-2 rounded mx-5 my-1">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
      </select>

      <input v-model="num2" class="p-2 rounded m-1" type="number" placeholder="Number 2" />

      <button @click="calculate" class="px-3 py-2 bg-lime-500 rounded ml-5">Calculate</button>
    </div>
  </div>
</template>

<style scoped>

</style>

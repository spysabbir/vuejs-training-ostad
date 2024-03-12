<script setup>
import { ref } from 'vue';
import axios from 'axios';

const quoteData = ref(null);

const fetchData = async () => {
  try {
    const response = await axios.get('https://animechan.xyz/api/random');
    quoteData.value = response.data;
  } catch (error) {
    console.error('Error fetching data:', error);
  }
};
</script>

<template>
    <h1 class="text-2xl text-center text-white underline mb-5">Quote</h1>
    <div class="text-center">
      <button @click="fetchData" class="py-2 px-3 bg-green-600 rounded text-white">Fetch Data</button>
      <div v-if="quoteData" class="m-3 bg-slate-200 rounded p-2">
        <p><strong>ID:</strong> {{ quoteData.id }}</p>
        <p><strong>Quote:</strong> {{ quoteData.quote }}</p>
        <p><strong>Anime:</strong> {{ quoteData.anime }}</p>
        <p><strong>Character:</strong> {{ quoteData.character }}</p>
      </div>
    </div>
</template>

<style scoped>

</style>
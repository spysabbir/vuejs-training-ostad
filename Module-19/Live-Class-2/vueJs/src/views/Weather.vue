<template>
  <div class="flex justify-center items-center mt-5 p-3 bg-gray-100">
    <div class="bg-white p-8 rounded shadow">
      <h1 class="text-2xl font-bold mb-2">Weather</h1>
      <div v-if="weather" class="my-4">
        <div class="flex items-center">
          <img :src="'http://openweathermap.org/img/wn/' + weather.weather[0].icon + '.png'" alt="weather icon" class="mr-2">
          <p class="text-lg font-semibold">{{ weather.weather[0].description }}</p>
        </div>
        <p class="text-xl">{{ Math.round(weather.main.temp) }}°C</p>
        <p>Feels like: {{ Math.round(weather.main.feels_like) }}°C</p>
        <p>Humidity: {{ weather.main.humidity }}%</p>
        <p>Wind: {{ Math.round(weather.wind.speed) }} m/s</p>
      </div>
      <div class="mb-4">
        <input v-model="city" type="text" placeholder="Enter city name" class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
      </div>
      <button @click="fetchWeather" class="py-2 px-4 bg-blue-500 text-white rounded-md focus:outline-none">Get Weather</button>
      <div v-if="error" class="text-red-500 mt-4">{{ error }}</div>
    </div>
  </div>
</template>
  
<script setup>
import { ref, onMounted } from 'vue';

const city = ref('gazipur');
const weather = ref(null);
const error = ref('');

const fetchWeather = async () => {
  if (!city.value) {
    error.value = 'Please enter a city name';
    return;
  }

  try {
    const response = await fetch(`https://api.openweathermap.org/data/2.5/weather?q=${city.value}&units=metric&appid=42100c79421561797c66e4b1b1b4fe85`);

    if (!response.ok) {
      throw new Error('Failed to fetch weather data');
    }

    const data = await response.json();
    weather.value = data;
    error.value = '';
  } catch (err) {
    console.error(err);
    error.value = 'An error occurred while fetching weather data';
  }
};

onMounted(() => {
  fetchWeather();
});
</script>

<style scoped>
</style>

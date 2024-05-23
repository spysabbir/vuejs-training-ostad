<template>
<div class="flex justify-center items-center mt-5 p-3 bg-gray-100">
    <div class="bg-white p-8 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Stopwatch</h1>
    <div class="text-3xl font-semibold mb-4">{{ formattedTime }}</div>
    <div class="flex justify-center">
        <button @click="toggleTimer" :class="{ 'bg-blue-500': !isRunning, 'bg-red-500': isRunning }" class="py-2 px-4 text-white rounded-md mr-4 focus:outline-none">{{ isRunning ? 'Stop' : 'Start' }}</button>
        <button @click="resetTimer" :disabled="!isRunning && currentTime === 0" class="py-2 px-4 bg-gray-300 text-gray-600 rounded-md focus:outline-none">Reset</button>
    </div>
    </div>
</div>
</template>

<script setup>
import { ref, computed } from 'vue';

const startTime = ref(0);
const currentTime = ref(0);
const interval = ref(null);
const isRunning = ref(false);

const formattedTime = computed(() => {
    const totalMilliseconds = isRunning.value ? Date.now() - startTime.value + currentTime.value : currentTime.value;
    const minutes = Math.floor(totalMilliseconds / (1000 * 60));
    const seconds = Math.floor((totalMilliseconds % (1000 * 60)) / 1000);
    const milliseconds = Math.floor((totalMilliseconds % 1000) / 10);
    return `${padTime(minutes)}:${padTime(seconds)}.${padTime(milliseconds)}`;
});

const padTime = (value) => {
    return value.toString().padStart(2, '0');
};

const toggleTimer = () => {
    if (isRunning.value) {
        clearInterval(interval.value);
        currentTime.value = Date.now() - startTime.value + currentTime.value;
    } else {
        startTime.value = Date.now();
        interval.value = setInterval(() => {
        currentTime.value = Date.now() - startTime.value + currentTime.value;
        }, 10);
    }
    isRunning.value = !isRunning.value;
};

const resetTimer = () => {
    clearInterval(interval.value);
    startTime.value = 0;
    currentTime.value = 0;
    isRunning.value = false;
};
</script>

<style scoped>

</style>
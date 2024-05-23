<template>
  <div class="flex justify-center items-center mt-5 p-3 bg-gray-100">
    <div class="bg-white p-8 rounded shadow">
      <h1 class="text-3xl font-bold mb-6">Countdown</h1>

      <div v-if="timeLeft !== null" class="my-4 text-xl font-semibold">
        <div class="flex justify-center items-center">
          {{ formatTime(timeLeft) }}
        </div>
        <div v-if="showAlarm" class="flex justify-center items-center">
          <strong class="mt-4 text-xl font-semibold text-red-500">
            {{ alarmMessage }}
          </strong>
        </div>
      </div>

      <div class="grid grid-cols-3 gap-4 mb-4">
        <div>
          <label for="hours" class="block mb-2">Hours</label>
          <input v-model.number="hours" id="hours" type="number" min="0" class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
        </div>
        <div>
          <label for="minutes" class="block mb-2">Minutes</label>
          <input v-model.number="minutes" id="minutes" type="number" min="0" class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
        </div>
        <div>
          <label for="seconds" class="block mb-2">Seconds</label>
          <input v-model.number="seconds" id="seconds" type="number" min="0" class="w-full border border-gray-300 px-3 py-2 rounded-md focus:outline-none focus:ring focus:ring-blue-200">
        </div>
      </div>
      
      <div class="flex justify-center items-center mb-4">
        <button @click="startCountdown" class="py-2 px-4 mx-2 bg-blue-500 text-white rounded-md focus:outline-none">Start</button>
        <button @click="resetCountdown" class="py-2 px-4 mx-2 bg-red-500 text-white rounded-md focus:outline-none">Reset</button>
      </div>

    </div>
  </div>
</template>

<script setup>
import { ref, onUnmounted } from 'vue';
import showAlert from '../helpers/alert';

const hours = ref(0);
const minutes = ref(0);
const seconds = ref(0);
const alarmMessage = ref('Time is up!');
const timeLeft = ref(null);
const countdownInterval = ref(null);
const showAlarm = ref(false);

const startCountdown = () => {
  const totalSeconds = (hours.value * 3600) + (minutes.value * 60) + (seconds.value);
  if (totalSeconds <= 0) {
    showAlert('error', 'Please set a valid time to start the countdown.');
    return;
  }

  showAlarm.value = false;
  timeLeft.value = totalSeconds;

  countdownInterval.value = setInterval(() => {
    if (timeLeft.value > 0) {
      timeLeft.value--;
    } else {
      clearInterval(countdownInterval.value);
      playAlarm();
      showAlarm.value = true;
      showAlert('success', 'Countdown completed!');
    }
  }, 1000);
};

const resetCountdown = () => {
  clearInterval(countdownInterval.value);
  timeLeft.value = null;
  hours.value = 0;
  minutes.value = 0;
  seconds.value = 0;
  showAlarm.value = false;
};

const formatTime = (seconds) => {
  const h = Math.floor(seconds / 3600);
  const m = Math.floor((seconds % 3600) / 60);
  const s = seconds % 60;
  return `${String(h).padStart(2, '0')}:${String(m).padStart(2, '0')}:${String(s).padStart(2, '0')}`;
};

const playAlarm = () => {
  const audio = new Audio('/alarm.mp3');
  audio.play().catch(err => console.error("Audio playback failed", err));
};

onUnmounted(() => {
  clearInterval(countdownInterval.value);
});
</script>

<style scoped>

</style>

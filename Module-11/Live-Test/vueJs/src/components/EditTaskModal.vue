<script setup>
import { ref, defineProps, defineEmits } from 'vue';

const props = defineProps(['task']);
const task = ref({...props.task});

const emits = defineEmits(['update', 'close']);

const submitForm = () => {
  emits('update', task.value);
};

const closeModal = () => {
  emits('close');
};

</script>

<template>
  <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
    <div class="bg-white p-6 rounded shadow-md w-96">
      <h2 class="text-lg font-semibold mb-4">Edit Task</h2>
      <form @submit.prevent="submitForm">
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Name:</label>
          <input type="text" v-model="task.name" class="shadow w-full p-1 mt-1 border-gray-300 rounded">
        </div>
        <div class="mb-4">
          <label class="block text-sm font-medium text-gray-700">Time (Minutes):</label>
          <input type="number" v-model="task.time" class="shadow w-full p-1 mt-1 border-gray-300 rounded">
        </div>
        <div class="flex justify-end">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Submit</button>
          <button @click="closeModal" class="text-gray-700 font-bold py-2 px-4 rounded">Close</button>
        </div>
      </form>
    </div>
  </div>
</template>

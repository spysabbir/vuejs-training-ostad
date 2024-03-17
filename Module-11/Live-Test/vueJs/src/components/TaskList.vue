<script setup>
import { ref } from 'vue';
import EditTaskModal from './EditTaskModal.vue';

const tasks = ref([
    { name: 'Task 1', time: 30 },
    { name: 'Task 2', time: 40 },
    { name: 'Task 3', time: 60 },
    { name: 'Task 4', time: 45 },
    { name: 'Task 5', time: 50 },
]);

const showModal = ref(false);
const selectedTask = ref(null);

const openEditModal = (task) => {
    showModal.value = true;
    selectedTask.value = task;
};

const updateTask = (updatedTask) => {
    const index = tasks.value.findIndex((task) => task === selectedTask.value);
    if (!updatedTask.name) {
        alert('Task Name field Value Not Found!')
    } else if(!updatedTask.time) {
        alert('Task Time field Value Not Found!')
    }else{
        tasks.value[index] = { ...updatedTask };
        showModal.value = false;
    }
};

const closeModal = () => {
    showModal.value = false;
}
</script>

<template>
<div class="bg-slate-500 mt-5">
    <ul>
        <li v-for="(task, index) in tasks" :key="index" class="flex items-center justify-between py-2 px-4 border-b">
            <span>{{ task.name }} - {{ task.time }} Minutes</span>
            <button @click="openEditModal(task)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
        </li>
    </ul>
    <EditTaskModal :task="selectedTask" v-if="showModal" @update="updateTask" @close="closeModal"/>
</div>
</template>


<script setup>
  import { ref } from 'vue';
  import Swal from 'sweetalert2';

  const tasks = ref([
    { name: 'Task 1', time: 60 },
    { name: 'Task 2', time: 75 },
  ]);

  const addTaskPopupModel = ref(false);
  const newTask = ref({ name: '', time: '' });

  const openAddTaskPopup = () => {
    addTaskPopupModel.value = true;
  };

  const closeAddTaskPopup = () => {
    addTaskPopupModel.value = false;
    newTask.value = { name: '', time: '' };
  };

  const addTask = () => {
    if (!newTask.value.name) {
      showAlert('Please enter the task name.');
    } else if (!newTask.value.time) {
      showAlert('Please enter the task time.');
    } else {
      tasks.value.push({ name: newTask.value.name, time: parseInt(newTask.value.time) });
      closeAddTaskPopup();
      showAlert('Task added successfully!', 'success');
    }
  };

  const editTaskPopupModel = ref(false);
  const editedTask = ref({ name: '', time: '' });
  const editedTaskIndex = ref(-1);

  const openEditTaskPopup = (index) => {
    editedTaskIndex.value = index;
    editedTask.value = { ...tasks.value[index] };
    editTaskPopupModel.value = true;
  };

  const closeEditTaskPopup = () => {
    editedTaskIndex.value = -1;
    editedTask.value = { name: '', time: '' };
    editTaskPopupModel.value = false;
  };

  const updateTask = () => {
    if (!editedTask.value.name) {
      showAlert('Please enter the task name.');
    } else if (!editedTask.value.time) {
      showAlert('Please enter the task time.');
    } else {
      tasks.value[editedTaskIndex.value] = { ...editedTask.value };
      closeEditTaskPopup();
      showAlert('Task updated successfully!', 'success');
    }
  };

  const removeTask = (index) => {
    tasks.value.splice(index, 1);
    showAlert('Task removed successfully!', 'success');
  };

  const showAlert = (message, type = 'error') => {
    Swal.fire({
      icon: type,
      text: message,
      showConfirmButton: false,
      timer: 1500,
    });
  };
</script>

<template>
  <div class="container mx-auto bg-gray-600 mt-8 w-1/2 p-5">
    <!-- Add Task Button -->
    <div class="flex justify-between items-center mb-5">
      <h1 class="text-2xl font-bold text-white">Task List</h1>
      <button @click="openAddTaskPopup" class="bg-blue-500 text-white p-2 rounded">Add Task</button>
    </div>

    <!-- Task List -->
    <div v-if="tasks.length > 0" class="border-2 border-gray-800 p-3">
      <div v-for="(task, index) in tasks" :key="index" class="flex justify-between items-center bg-gray-100 p-4 mb-2">
        <span>{{ task.name }} ({{ task.time }} Minutes)</span>
        <div class="flex">
          <button @click="openEditTaskPopup(index)" class="bg-yellow-500 text-white px-2 py-1 rounded mx-2">Edit</button>
          <button @click="removeTask(index)" class="bg-red-500 text-white px-2 py-1 rounded">Remove</button>
        </div>
      </div>
    </div>
    <div v-else class="border-2 border-gray-800 p-3">
      <p class="text-red-500 text-xl text-center">No tasks available.</p>
    </div>

    <!-- Add Task Popup -->
    <div v-if="addTaskPopupModel" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-50">
      <div class="bg-white p-5 rounded shadow-md w-1/3">
        <h2 class="text-xl font-bold mb-5">Add Task</h2>
        <form @submit.prevent="addTask">
          <div class="mb-3">
            <label for="taskName" class="block text-sm font-medium text-gray-600">Task Name</label>
            <input v-model="newTask.name" type="text" id="taskName" name="taskName" placeholder="Enter task name..." class="w-full mt-1 p-2 border border-gray-300 rounded-md">
          </div>
          <div class="mb-3">
            <label for="taskTime" class="block text-sm font-medium text-gray-600">Task Time (Minutes)</label>
            <input v-model="newTask.time" type="number" id="taskTime" name="taskTime" placeholder="Enter task time..." class="w-full mt-1 p-2 border border-gray-300 rounded-md">
          </div>
          <div class="mb-3 float-end">
            <button type="submit" class="mx-2 bg-blue-500 text-white p-2 rounded">Add Task</button>
            <button @click="closeAddTaskPopup" type="button" class="mx-2 bg-gray-400 text-white p-2 rounded">Cancel</button>
          </div>
        </form>
      </div>
    </div>

    <!-- Edit Task Popup -->
    <div v-if="editTaskPopupModel" class="fixed top-0 left-0 w-full h-full flex items-center justify-center bg-gray-800 bg-opacity-50">
      <div class="bg-white p-5 rounded shadow-md w-1/3">
        <h2 class="text-xl font-bold mb-5">Edit Task</h2>
        <form @submit.prevent="updateTask">
          <div class="mb-3">
            <label for="editedTaskName" class="block text-sm font-medium text-gray-600">Task Name</label>
            <input v-model="editedTask.name" type="text" id="editedTaskName" name="editedTaskName" placeholder="Enter task name..." class="w-full mt-1 p-2 border border-gray-300 rounded-md">
          </div>
          <div class="mb-3">
            <label for="editedTaskTime" class="block text-sm font-medium text-gray-600">Task Time (Minutes)</label>
            <input v-model="editedTask.time" type="number" id="editedTaskTime" name="editedTaskTime" placeholder="Enter task time..." class="w-full mt-1 p-2 border border-gray-300 rounded-md">
          </div>
          <div class="mb-3 float-end">
            <button type="submit" class="mx-2 bg-blue-500 text-white p-2 rounded">Update Task</button>
            <button @click="closeEditTaskPopup" type="button" class="mx-2 bg-gray-400 text-white p-2 rounded">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>
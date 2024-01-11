<script setup>
    import { ref } from 'vue'

    const tasks = ref([
        { id: 1, name: 'Task 1' },
        { id: 2, name: 'Task 2' },
        { id: 3, name: 'Task 3' },
        { id: 4, name: 'Task 4' },
    ])

    function addNew() {
        const newTask = {
            id: tasks.value.length+1,
            name: `Task ${tasks.value.length+1}`
        }

        tasks.value.push(newTask)
    }
</script>

<template>
    <ul>
      <li class="bg-indigo-700 p-2 m-1" v-for="task in tasks" :key="task.id">
        {{ task.name }}
      </li>
    </ul>

    <button type="button" @click="addNew()" class="bg-yellow-600 p-2">Add New</button>
</template>

<style scoped>

</style>
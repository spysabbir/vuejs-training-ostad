<script setup>
    import { ref, reactive } from 'vue'

    const students = reactive([
        {name: 'Sabbir', gender: 'Male'}
    ])
    const addStudent = () => {
        students.push({name: '', gender: ''})
    }
</script>

<template>
    <div class="container mx-auto">
        <p>{{ students }}</p>
        <div class="mt-3 border border-gray-700 p-2" v-for="(student, index) in students" :key="index">
            <div class="mt-3">
                <label class="mr-3">Name:</label>
                <input type="text" v-model="student.name" class="px-2">
            </div>
            <div class="mt-3 flex justify-center">
                <label class="mr-3">Gender:</label>
                <div class="">
                    <input type="radio" name="gender" class="mr-1" value="Male" id="Male" v-model="student.gender">
                    <label for="Male">Male</label>
                </div>
                <div class="ml-3">
                    <input type="radio" name="gender" class="mr-1" value="Female" id="Female" v-model="student.gender">
                    <label for="Female">Female</label>
                </div>
            </div>
        </div>
        <button type="button" class="mt-3 bg-gray-400" @click="addStudent()">Add</button>
    </div>
</template>
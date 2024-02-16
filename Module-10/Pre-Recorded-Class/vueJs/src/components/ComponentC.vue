<script setup>
    import { inject } from 'vue'

    // const props = defineProps(['course'])

    // const course = inject('course')
    // const courseStock = inject('course-stock')

  import { course } from './../data/course.js'


</script>

<template>
      <h1 class="text-xl text-green-600 mt-2" >Component C</h1>
    <p>Course Name: {{ course.name }}</p>
    <p>Course Stock: {{ courseStock }}</p>

    

    <div>
        <input type="text" v-model="course.name">
    </div>
</template>
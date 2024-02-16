<script setup>
    import { inject } from 'vue'

    import ComponentC from './ComponentC.vue'
    // const props = defineProps(['course'])

    // const course = inject('course')

    import { course } from './../data/course.js'


</script>

<template>
      <h1 class="text-xl text-indigo-600 mt-2" >Component B</h1>
    <p>Course Name: {{ course.name }}</p>

    <!-- <div>
        <ComponentC :course="course"/>
    </div> -->

    <div>
        <ComponentC />
    </div>
</template>
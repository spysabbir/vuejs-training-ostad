<script setup>
    // import { inject } from 'vue'
    import { provide } from 'vue'

    import ComponentB from './ComponentB.vue'
    // const props = defineProps(['course'])

    // const course = inject('course')

    // provide('course-stock', 100);

    // import { course } from './../data/course.js'

</script>

<template>
    <h1 class="text-xl text-pink-600 mt-2" >Component A</h1>
    <!-- <p>Course Name: {{ course.name }}</p> -->

    <!-- <div>
        <ComponentB :course="course"/>
    </div> -->

    <div>
        <ComponentB />
    </div>
</template>
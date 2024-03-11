<script setup>
    import { ref } from 'vue'
    import SinglePost from './SinglePost.vue'
    defineProps(['posts'])
</script>

<template>
<div class="grid grid-cols-3 gap-4">
    <SinglePost v-for="post in posts" :key="post.id" :post="post"/>
</div>
</template>

<style scoped>

</style>

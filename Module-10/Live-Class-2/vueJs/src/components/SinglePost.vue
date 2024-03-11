<script setup>
import { ref } from 'vue'
defineProps(['post'])
</script>

<template>
<div class="max-w-sm rounded overflow-hidden shadow-lg">
    <img class="w-full" src="https://v1.tailwindcss.com/img/card-top.jpg" alt="Placeholder Image"/>
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ post.title }}</div>
        <p class="text-gray-700 text-base">
            {{ post.body }}
        </p>
    </div>
</div>
</template>

<style scoped>

</style>

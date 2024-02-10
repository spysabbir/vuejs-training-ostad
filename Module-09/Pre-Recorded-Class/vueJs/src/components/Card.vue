<script setup>
    import Rating from './Rating.vue'

    const props = defineProps([
        'image', 'price', 'rating', 'title'
    ])
</script>

<template>
<div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <a href="#">
        <img class="p-8 rounded-t-lg" :src="image" alt="product image" />
    </a>
    <div class="px-5 pb-5">
        <a href="#">
            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ title }}</h5>
        </a>
        <Rating :rating="rating"></Rating>
        <div class="flex items-center justify-center">
            <span class="text-3xl font-bold text-gray-900 dark:text-white">${{ price }}</span>
        </div>
    </div>
</div>
</template>
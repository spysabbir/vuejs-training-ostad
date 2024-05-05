<script setup>
defineProps({
    text: String,
    url: String || Boolean
})
</script>

<template>
    <a v-if="url != false" :href="url">{{ text }}</a>
    <button class="btn" v-else>{{ text }}</button>
</template>

<style scoped>
    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #15c724;
        color: #fff;
        cursor: pointer;
        margin: 10px;
    }
    .btn:hover {
        background-color: #0d9e19;
    }

    a {
        text-decoration: none;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
    }
    a:hover {
        background-color: #0056b3;
    }
</style>
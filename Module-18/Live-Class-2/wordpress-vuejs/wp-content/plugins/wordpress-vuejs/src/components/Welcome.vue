<script setup>
import data from "../data.js";
</script>
<template>
    <div v-if="data.welcome != null">
        <h1>{{ data.welcome.title }}</h1>
        <p>{{ data.welcome.content }}</p>
    </div>
</template>
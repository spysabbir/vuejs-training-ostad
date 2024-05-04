<script setup>
import data from "../data.js";
</script>
<template>
    <div v-if="data.settings != null">
        <h1>{{ data.settings.title }}</h1>
        <p>{{ data.settings.content }}</p>
    </div>
</template>
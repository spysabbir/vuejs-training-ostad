<script setup>
import { useRouter, useRoute } from 'vue-router'
const router = useRouter()
const route = useRoute()
</script>

<template>
    <h1 class="text-2xl text-center underline">Blog Details: {{ route.params.id }}</h1>
</template>

<style scoped>

</style>
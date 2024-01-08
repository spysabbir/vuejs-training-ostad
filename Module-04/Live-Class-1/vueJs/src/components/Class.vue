<script setup>
    const number = 5
    const msg = "Hello vueJs 3"
    const status = true
</script>

<template>
    <p>{{ msg }}</p>

    <p class="desc" :class="status ? 'active' : ''">{{ msg }}</p>

    <p class="desc" :class="`item-${number}`">{{ msg }}</p>
</template>

<style scoped>
    p {
        color: blueviolet;
    }
    p.active {
        color: rgb(43, 226, 134);
    }
</style>
<template>
<div class="container mx-auto bg-gray-400 p-5 rounded mt-5">
    <h1 class="text-4xl text-center">Hello Vue 3</h1>
    <p class="text-center">This is a simple Vue 3 project</p>

    <hr class="my-5">

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
        <router-link to="/" class="btn">Home</router-link>
        <router-link to="/bmi-calculator" class="btn">BMI Calculator</router-link>
        <router-link to="/calculator" class="btn">Calculator</router-link>
        <router-link to="/currency-converter" class="btn">Currency Converter</router-link>
        <router-link to="/stopwatch" class="btn">Stopwatch</router-link>
        <router-link to="/url-shortener" class="btn">URL Shortener</router-link>
        <router-link to="/weather" class="btn">Weather</router-link>
        <router-link to="/countdown" class="btn">Countdown</router-link>
        <router-link to="/media-player" class="btn">Media Player</router-link>
        <router-link to="/photo-gallery" class="btn">Photo Gallery</router-link>
        <router-link to="/quiz" class="btn">Quiz</router-link>
        <router-link to="/todo" class="btn">Todo</router-link>
    </div>

    <hr class="my-5">

    <div>
        <router-view></router-view>
    </div>
</div>
</template>

<script setup>
</script>

<style scoped>
.btn {
    @apply bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded;
}

.router-link-active {
    background-color: #3aaa07;
    color: white;
}
</style>

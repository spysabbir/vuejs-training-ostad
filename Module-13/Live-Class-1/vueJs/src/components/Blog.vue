<script setup>

</script>

<template>
    <h1 class="text-2xl text-center underline">Blog</h1>
    <div class="mb-5 p-5 bg-slate-500">
        <ul class="flex justify-center">
            <li><router-link to="/blog/details/1" class="px-3 py-2 bg-green-400 rounded m-1">Blog 1</router-link></li>
            <li><router-link to="/blog/details/2" class="px-3 py-2 bg-green-400 rounded m-1">Blog 2</router-link></li>
            <li><router-link to="/blog/details/3" class="px-3 py-2 bg-green-400 rounded m-1">Blog 3</router-link></li>
            <li><router-link to="/blog/details/4" class="px-3 py-2 bg-green-400 rounded m-1">Blog 4</router-link></li>
        </ul>
    </div>
    <router-view></router-view>
</template>

<style scoped>

</style>
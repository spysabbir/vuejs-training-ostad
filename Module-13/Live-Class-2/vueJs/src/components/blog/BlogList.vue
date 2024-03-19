<script setup>
import { data, fn } from "../../data.js";
import BlogItem from '../parts/BlogItem.vue';
</script>

<template>
  <div class="grid grid-cols-3 gap-20 items-center justify-between p-24">
    <BlogItem v-for="post in data.posts" :key="post.id" :post="post" />
  </div>
</template>

<style scoped>

</style>

<script setup>
import { data, fn } from "../data.js";

const getPosts = () => {
  const res = fn.fetchPublicApi("/posts", "get");
  res.then((response) => {
    data.posts = response.posts;
  });
};

getPosts();
</script>

<template>
<h1 class="text-2xl text-center text-orange-400 underline">Blog</h1>
<router-view></router-view>
</template>

<style scoped>

</style>

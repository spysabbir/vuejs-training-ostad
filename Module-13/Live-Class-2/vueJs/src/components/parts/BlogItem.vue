<script setup>
defineProps({
  post: Object,
});

function limitWords(body) {
  return body.split(" ").slice(0, 10).join(" ");
}
</script>
<template>
  <router-link :to="`/blog/${post.id}`">
    <div class="max-w-md rounded overflow-hidden shadow-lg">
      <img class="w-full" src="https://source.unsplash.com/random/300x200" alt="Sunset in the mountains"/>
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ post.title }}</div>
        <p class="text-gray-700 text-base">{{ limitWords(post.body) }}</p>
      </div>
      <div class="px-6 pt-4 pb-2">
        <span v-for="tag in post.tags" :key="tag" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2" >#{{ tag }}</span>
      </div>
    </div>
  </router-link>
</template>
    
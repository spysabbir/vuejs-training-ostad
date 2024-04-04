<script setup>
import { ref, computed } from 'vue'
import { useRoute } from 'vue-router'
import { useBlogs } from '../store'

const route = useRoute()
const blogId = ref(parseInt(route.params.id))
const blogsStore = useBlogs()

const blog = computed(() => {
  return blogsStore.getBlogById(blogId.value)
})

</script>

<template>
  <div class="w-[1200px] mx-auto bg-slate-400 mt-5 p-5 rounded">
    <h1 class="text-3xl font-bold text-center">Blog Details</h1>
    <hr>
    <div class="my-3">
      <h2 class="text-xl font-bold text-center">{{ blog.title }}</h2>
      <p class="text-center">{{ blog.content }}</p>
    </div>
    <hr>
    <div class="mt-3 flex justify-center">
      <router-link :to="{ name: 'Blogs' }" class="px-4 py-2 bg-indigo-500 text-white rounded">Back to Blog List</router-link>
    </div>
  </div>
</template>
<script setup>
  import { ref } from 'vue'
  import { data, fn } from './../data'

  const newPost = ref({
    title: '',
    body: '',
    userId: 1,
  })

  const props = defineProps(['status', 'loading'])
  const emit = defineEmits(['update:status', 'update:loading'])

  const createNewPost = () => {
    emit('update:loading', true);
    const res = fn.fetchPublicApi('/posts', newPost.value, 'post');
    res.then((response) => {
      emit('update:status', false);
      emit('update:loading', false);
      data.posts.unshift({
        ...newPost.value,
        id: response.id
      })
      newPost.value.title = '';
      newPost.value.body = '';
    })
  }
</script>

<template>
<div class="flex flex-col justify-between items-center mb-6 gap-6">
  <div class="flex w-full">
    <div class="w-1/5">
      <label class="block text-gray-500 font-bold text-left mb-1 pr-4" for="inline-full-name">Title</label>
    </div>
    <div class="w-4/5">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" v-model="newPost.title" type="text"/>
    </div>
  </div>
  <div class="flex w-full">
    <div class="w-1/5">
      <label class="block text-gray-500 font-bold text-left mb-1 pr-4" for="inline-full-name">Body</label>
    </div>
    <div class="w-4/5">
      <textarea rows="4" v-model="newPost.body" name="comment" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"></textarea>
    </div>
  </div>
  <button type="button" @click.prevent="createNewPost()" class="px-3 py-2 bg-indigo-800 rounded text-white">Add Post</button>
</div>
</template>

<style scoped>

</style>

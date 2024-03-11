<script setup>
  import { ref } from 'vue'
  import AddPost from './components/AddPost.vue'
  import PostList from './components/PostList.vue'
  import Paginate from './components/Paginate.vue'
  import Loader from './components/Loader.vue'

  import { data, fn } from './data'

  const addPostDiv = ref(false)
  const loading = ref(false)
  const post = ref([])

  const getPostFromServer = () => {
    loading.value = true
    const res = fn.fetchPublicApi('/posts', {}, 'get');
    res.then((response) => {
      loading.value = false;
      data.posts = response;
      post.value = JSON.parse(JSON.stringify(data.posts))
    })
  }
  getPostFromServer()

  const getPost = () => {
    let indexNumber = 0;
    if (data.page > 1) {
      indexNumber = (data.page+6)
    }
    post.value = JSON.parse(JSON.stringify(data.posts));
    return post.value.splice(indexNumber, 6);
  }
</script>

<template>
  <div class="container mx-auto w-[1000px] p-5">
    <div class="flex justify-between items-center mb-6">
      <h1 class="font-bold text-xl mb-2">Simple Blog</h1>
      <button @click="addPostDiv = !addPostDiv" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
        Add Post
      </button>
    </div>

    <AddPost v-if="addPostDiv" v-model:status="addPostDiv" v-model:loading="loading"/>

    <PostList v-if="!loading" :posts="getPost()"/>

    <Paginate v-if="!loading"/>

    <Loader v-if="loading"/>
  </div>
</template>

<style scoped>

</style>

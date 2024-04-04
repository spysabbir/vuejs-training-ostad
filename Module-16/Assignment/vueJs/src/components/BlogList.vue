<script setup>
import { ref } from 'vue'
import { storeToRefs } from 'pinia'
import { useBlogs } from '../store'

const blogsStore = useBlogs()
const { getBlogs } = storeToRefs(blogsStore)

const newBlogTitle = ref('')
const newBlogContent = ref('')
const selectedBlogId = ref(null)

const showFrom = ref(false)
const isEditing = ref(false)

const addBlog = () => {
  const title = newBlogTitle.value.trim();
  const content = newBlogContent.value.trim();
  if (!title || !content) {
    alert('Please fill in all fields')
    return
  }
  blogsStore.addBlog({ title, content })
  resetForm()
}

const editBlog = (blogId) => {
  const blog = blogsStore.getBlogById(blogId)
  if (blog) {
    newBlogTitle.value = blog.title
    newBlogContent.value = blog.content
    selectedBlogId.value = blogId
    isEditing.value = true
  }
}

const cancelEdit = () => {
  resetForm()
  isEditing.value = false
}

const updateBlog = () => {
  const title = newBlogTitle.value.trim();
  const content = newBlogContent.value.trim();
  if (!title || !content) {
    alert('Please fill in all fields')
    return
  }
  blogsStore.updateBlog({ id: selectedBlogId.value, title, content })
  resetForm()
  isEditing.value = false
}

const submitForm = () => {
  if (selectedBlogId.value) {
    updateBlog()
  } else {
    addBlog()
  }
}

const removeBlog = (blogId) => {
  blogsStore.deleteBlog(blogId)
}

const resetForm = () => {
  newBlogTitle.value = ''
  newBlogContent.value = ''
  selectedBlogId.value = null
}
</script>

<template>
  <div class="w-[1200px] mx-auto bg-slate-400 mt-5 p-5 rounded">
    <h1 class="text-3xl font-bold text-center">Blog List</h1>
    <div class="mt-3">
      <form @submit.prevent="submitForm" class="w-[1000px] mx-auto">
        <input v-model="newBlogTitle" class="w-full p-2 border border-gray-300 rounded" placeholder="Title"/>
        <textarea v-model="newBlogContent" class="w-full p-2 border border-gray-300 rounded mt-2" placeholder="Content"></textarea>
        <button type="submit" class="p-2 bg-blue-500 text-white rounded">{{ isEditing ? 'Update Blog' : 'Add Blog' }}</button>
        <button v-if="isEditing" @click="cancelEdit" class="p-2 ml-2 bg-gray-500 text-white rounded">Cancel</button>
      </form>
    </div>
    <div class="mt-4">
      <div v-for="blog in getBlogs" :key="blog.id" class="p-2 border border-gray-300 rounded mt-2">
        <h2 class="text-xl font-bold">{{ blog.title }}</h2>
        <p>{{ blog.content.slice(0, 150) }} ...</p>
        <div class="mt-2">
          <button @click="editBlog(blog.id)" class="px-2 py-1 mx-2 bg-green-500 text-white rounded">Edit</button>
          <button @click="removeBlog(blog.id)" class="px-2 py-1 mx-2 bg-red-500 text-white rounded">Delete</button>
          <router-link :to="{ name: 'BlogDetails', params: { id: blog.id }}" class="px-2 py-1 bg-indigo-400 rounded mx-1">See More</router-link>
        </div>
      </div>
    </div>
  </div>
</template>


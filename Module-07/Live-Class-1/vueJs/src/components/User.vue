<script setup>
import { ref, reactive } from 'vue'

const users = reactive([])
const searchInput = ref("Sabbir")

const getUserFromServer = () => {
  fetch('https://jsonplaceholder.typicode.com/users')
      .then((response) => response.json())
      .then((data) => {
        data.forEach(user => {
          // users.push(user)
          users.push({name: user.name, email: user.email})
        });
      })
}
getUserFromServer()

const clearSearch = () => {
  searchInput.value = ""
}

const getUsers = () => {
  if(searchInput.value) {
    return users.filter((user) => {
      if(user.name.toLowerCase().includes(searchInput.value.toLowerCase())) {
        return user;
      }
    })
  }else{
    return users
  }
}

</script>

<template>
<div class="container mx-auto">
  <input type="text" placeholder="Search..." v-model="searchInput" class="p-1 my-3">
  <button @click="clearSearch()" class="bg-red-800 p-1 m-1">Clear</button>
  <p class="text-green-700 m-2">Result Showing: {{ searchInput }}</p>
  <ul>
    <li v-for="user in getUsers()" :key="user.id" class="bg-pink-400 p-1 m-1">
      Name: {{ user.name }},
      Email: {{ user.email }}
    </li>
  </ul>
</div>
</template>

<style scoped>

</style>

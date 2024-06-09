<script setup>
import { authStore } from '../../store/store';

const auth = authStore;
</script>

<template>
  <header class="bg-black border-b border-light-100 h-20 text-white flex items-center p-5 text-2xl">
    <section class="flex justify-between w-full">
      <h1>Admin Dashboard - (<span>{{ auth.user?.role }}</span>)</h1>
      <button @click="auth.logout" class="bg-blue-500 hover:bg-blue-700 text-white text-sm py-2 px-4 rounded">
        Logout
      </button>
    </section>
  </header>
  
  <section class="flex">
    <aside class="w-60 bg-black text-white p-5">
      <h2 class="text-2xl font-bold mb-3">Admin</h2>
      <ul class="space-y-5">
        <li>
          <router-link to="/" class="hover:underline">Home</router-link>
        </li>
        <!-- Add more links here as needed -->
      </ul>
    </aside>
    
    <main class="flex-1 min-h-screen p-5">
      <router-view></router-view>
    </main>
  </section>
  
  <footer class="bg-black text-white text-center py-4">
    © 2024 Admin Dashboard
  </footer>
</template>

<style scoped>
header {
  background-color: #000;
  border-bottom: 1px solid #e5e7eb;
}

aside {
  background-color: #000;
}

footer {
  background-color: #000;
}
</style>

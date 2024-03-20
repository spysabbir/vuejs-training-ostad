<script setup>
import { RouterLink, RouterView } from 'vue-router'
import AuthState from './data/authstate';

</script>

<template>
  <header>
    <div class="w-[1000px] mx-auto bg-slate-400 rounded p-5 mt-5">
      <nav>
        <RouterLink class="px-3 py-2 bg-blue-400 rounded mx-1" to="/">Home</RouterLink>
        <RouterLink class="px-3 py-2 bg-green-400 rounded mx-1" to="/about">About</RouterLink>
        <RouterLink v-if="AuthState.isAuthenticated" class="px-3 py-2 bg-indigo-400 rounded mx-1" to="/secret">Secret</RouterLink>
        <RouterLink v-if="!AuthState.isAuthenticated" class="px-3 py-2 bg-pink-400 rounded mx-1" to="/login">Login</RouterLink>
        <a href="#" v-if="AuthState.isAuthenticated" @click="AuthState.logout()" class="px-3 py-2 bg-pink-400 rounded mx-1">Logout</a>
      </nav>
    </div>
  </header>

  <RouterView />
</template>

<style scoped>

</style>
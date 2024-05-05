<script setup>
import HelloWorld from './components/HelloWorld.vue'
import { Button, Input } from 'form-library'
import 'form-library/style.css'
</script>

<template>
  <div>
    <a href="https://vitejs.dev" target="_blank">
      <img src="/vite.svg" class="logo" alt="Vite logo" />
    </a>
    <a href="https://vuejs.org/" target="_blank">
      <img src="./assets/vue.svg" class="logo vue" alt="Vue logo" />
    </a>
  </div>
  <HelloWorld msg="Vite + Vue" />


  <Input label="Name" type="text" placeholder="Enter your name" />
  <Input label="Email" type="email" placeholder="Enter your email" />
  <Input label="Password" type="password" placeholder="Enter your password" />
  <Button text="Submit" :url="false" />
  <Button text="Click" url="https://spysabbir.com" />


</template>

<style scoped>
.logo {
  height: 6em;
  padding: 1.5em;
  will-change: filter;
  transition: filter 300ms;
}
.logo:hover {
  filter: drop-shadow(0 0 2em #646cffaa);
}
.logo.vue:hover {
  filter: drop-shadow(0 0 2em #42b883aa);
}
</style>

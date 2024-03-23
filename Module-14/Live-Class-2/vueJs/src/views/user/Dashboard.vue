<script setup>
import { ref } from "vue";
import { data, fn } from "../../data/data";

const userData = ref({});

const getUserData = () => {
  const res = fn.fetchAuthApi("/api/user", {}, "GET");
  res.then((response) => {
    userData.value = response.data;
  });
}; 

getUserData();

</script>
<template>
  <h1>User Dashboard</h1>
  <hr class="my-10">
  <h2>Name: {{userData.name}}</h2>
  <h2>Email: {{userData.email}}</h2>
</template>
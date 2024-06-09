<script setup>
import { authStore } from "../../store/store";
const auth = authStore;
</script>
<template>
  <section class="mt-[40px] text-white p-5">
    <h2 class="text-2xl font-bold mb-3">Admin</h2>
    <ul class="flex flex-col space-y-5">
      <li>
        <router-link to="/admin">Dashboard</router-link>
      </li>
      <li>
        <router-link to="/products">Products</router-link>
      </li>
      <li>
        <router-link to="/orders">Orders </router-link>
      </li>
    </ul>
  </section>
</template>

<style></style>
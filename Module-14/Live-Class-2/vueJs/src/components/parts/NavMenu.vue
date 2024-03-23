<script setup>
import { useRoute, useRouter } from "vue-router";
import { data, fn } from "../../data/data";
import { ref, watch } from "vue";

const route = useRoute();
const router = useRouter();
const isAuthenticated = ref(false);

watch(route, () => {
  const authData = fn.getAuthStorage();

  if (authData != undefined && authData != null && authData != "") {
    isAuthenticated.value = true;
  } else {
    isAuthenticated.value = false;
  }
});

const logout = () => {
  fn.fetchAuthApi("/api/logout", {}, "GET");
  fn.removeStorage("auth");
  router.push("/login");
};
</script>
<template>
  <nav
    class="flex gap-10 items-center justify-between flex-wrap bg-teal-500 p-6 px-24"
  >
    <div class="flex items-center flex-shrink-0 text-white mr-6">
      <span class="font-semibold text-xl tracking-tight">Spy Sabbir</span>
    </div>
    <div class="block lg:hidden">
      <button
        class="flex items-center px-3 py-2 border rounded text-teal-200 border-teal-400 hover:text-white hover:border-white"
      >
        <svg
          class="fill-current h-3 w-3"
          viewBox="0 0 20 20"
          xmlns="http://www.w3.org/2000/svg"
        >
          <title>Menu</title>
          <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
        </svg>
      </button>
    </div>
    <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
      <div class="text-sm lg:flex-grow">
        <router-link
          class="block text-xl mt-4 lg:inline-block lg:mt-0 hover:text-white mr-10"
          :class="route.path === '/' ? 'text-white' : 'text-teal-200'"
          to="/"
          >Home</router-link
        >
        <router-link
          class="block text-xl mt-4 lg:inline-block lg:mt-0 hover:text-white mr-10"
          :class="route.path === '/about' ? 'text-white' : 'text-teal-200'"
          to="/about"
          >About</router-link
        >
        <router-link
          class="block text-xl mt-4 lg:inline-block lg:mt-0 hover:text-white"
          :class="
            route.path.startsWith('/user') ? 'text-white' : 'text-teal-200'
          "
          to="/user"
          >User</router-link
        >
      </div>
      <div>
        <a
          v-if="isAuthenticated"
          href="#"
          @click="logout()"
          class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0"
          >Logout</a
        >
        <router-link
          v-else
          class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-teal-500 hover:bg-white mt-4 lg:mt-0"
          to="/login"
          >Login</router-link
        >
      </div>
    </div>
  </nav>
</template>
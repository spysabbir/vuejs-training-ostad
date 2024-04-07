<script setup>
import { ref, reactive, onBeforeMount } from "vue";
import { useRoute } from "vue-router";
import { authStore } from "../store/store";
import { cart } from "../store/cart";

const route = useRoute();
const id = route.params.id;
// const product = reactive({});
const product = ref({});
onBeforeMount(() => {
  const res = authStore.fetchPublicApi(`/api/products/${id}`, {}, 'GET')
  res.then((data) => {
    // product.id = data.id;
    // product.title = data.title;
    // product.price = data.price;
    // product.description = data.description;
    // product.category = data.category;
    // product.image = data.image;
    // product.rating = data.rating;
    // product.rating_count = data.rating_count;
    product.value = data;
  });
});
</script>
<template>
  <article class="mb-10">
    <h1 class="text-xl mb-2">{{ product.title }}</h1>
    <span class="p-1 bg-red-300 rounded">Category: {{ product.category }}</span>
    <img class="w-60 mt-3" :src="product.image" :alt="product.title" />
    <p><strong>Description:</strong> {{ product.description }}</p>
    <p>Price: ${{ product.price }}</p>
    <p>
      <button @click="cart.addItem(product)" class="mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Add To Cart
      </button>
    </p>
  </article>
</template>

<style></style>
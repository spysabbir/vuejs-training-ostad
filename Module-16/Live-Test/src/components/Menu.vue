<script setup>
  const menuItems = [
    { id: 1, name: 'Burrito', price: '$100', image: 'img_burrito.svg'},
    { id: 2, name: 'Salad', price: '$150', image: 'img_salad.svg'},
    { id: 3, name: 'Cake', price: '$200', image: 'img_cake.svg'},
    { id: 4, name: 'Soup', price: '$250', image: 'img_soup.svg'},
    { id: 5, name: 'Fish', price: '$300', image: 'img_fish.svg'},
    { id: 6, name: 'Pizza', price: '$350', image: 'img_pizza.svg'},
    { id: 7, name: 'Rice', price: '$400', image: 'img_rice.svg'}
  ]
  
  const showAlert = (itemName) => {
    alert(`You clicked on ${itemName}`)
  }
</script>

<template>
  <div class="flex flex-col items-center">
    <h2 class="text-3xl font-bold mb-4">Menu</h2>
    <div class="mt-5 bg-slate-500 rounded p-5 flex flex-row items-center">
      <div v-for="item in menuItems" :key="item.id" class="mx-2">
        <button class="bg-gray-200 hover:bg-gray-300 px-4 py-2 rounded" @click="showAlert(item.name)">
          <img :src="item.image" alt="item.name" class="h-12 w-12 mr-2 mb-2 inline-block">
          <strong>{{ item.name }}</strong> <br>
          <strong class="mt-5">Price : {{ item.price }}</strong>
        </button>
      </div>
    </div>
    <router-link to="/" class="text-lg bg-pink-500 mt-5 text-white px-4 py-2 rounded hover:bg-pink-600 transition duration-300 ease-in-out">Home</router-link>
  </div>
</template>
  

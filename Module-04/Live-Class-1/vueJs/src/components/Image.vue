<script setup>
    const imgUrl = 'https://images.pexels.com/photos/5386829/pexels-photo-5386829.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load'
    const title = 'Black and White Laptop Computer Beside Black Headphones and Brown Bread on White Ceramic Plate'

    const img = {
        src: 'https://images.pexels.com/photos/5386829/pexels-photo-5386829.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
        alt: 'Black and White Laptop Computer Beside Black Headphones and Brown Bread on White Ceramic Plate'
    }
</script>

<template>
    <!-- <img :src="imgUrl" :alt="title" :title="title"> -->

    <img v-bind="img">
</template>

<style scoped>

</style>
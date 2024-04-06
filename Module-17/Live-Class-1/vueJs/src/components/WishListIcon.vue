<script setup>
import { wishlist } from '../store/wishlist'
const props = defineProps(['product'])
</script>
 
<template>
    <img class="w-8 cursor-pointer" :src="wishlist.getIcon(product)" alt="">
</template>
 
<style scoped></style>
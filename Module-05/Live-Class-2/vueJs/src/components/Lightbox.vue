<script setup>
import { ref } from 'vue';

const fullImg = ref('https://images.pexels.com/photos/19737002/pexels-photo-19737002/free-photo-of-stairs.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load')
const carouselImages = [
  {
    thumb: 'https://images.pexels.com/photos/19737002/pexels-photo-19737002/free-photo-of-stairs.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
    full: 'https://images.pexels.com/photos/19737002/pexels-photo-19737002/free-photo-of-stairs.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
  },
  {
    thumb: 'https://images.pexels.com/photos/19652396/pexels-photo-19652396/free-photo-of-riva-del-garda.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
    full: 'https://images.pexels.com/photos/19652396/pexels-photo-19652396/free-photo-of-riva-del-garda.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
  },
  {
    thumb: 'https://images.pexels.com/photos/13972469/pexels-photo-13972469.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
    full: 'https://images.pexels.com/photos/13972469/pexels-photo-13972469.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
  },
  {
    thumb: 'https://images.pexels.com/photos/13280779/pexels-photo-13280779.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
    full: 'https://images.pexels.com/photos/13280779/pexels-photo-13280779.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
  },
]
function setImg(image) {
  fullImg.value = image.full
}
</script>

<template>
    <section class="container mx-auto flex items-center flex-col">
      <div class="flex items-center text-center space-y-2">
        <img :src="item.thumb" alt="" @click="setImg(item)" class="w-48 h-48 m-3 cursor-pointer" v-for="item in carouselImages" :key="item.thumb">
      </div>
      <div>
        <img class="w-80 h-80" :src="fullImg" alt="">
      </div>
    </section>
</template>
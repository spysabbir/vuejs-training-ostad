<script setup>
import { ref } from 'vue'

const accordions = ref([
  {
    heading: "What is term?",
    content: "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi dolor dolorum odio, saepe quibusdam iusto possimus nesciunt dolores assumenda quae totam, doloremque odit. Itaque cum animi, labore debitis deserunt iusto!",
    isOpen: true,
  },
  {
    heading: "When to use Accordion Components?",
    content: "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ut suscipit itaque, sequi incidunt ab sit optio debitis dignissimos doloribus ratione nobis id mollitia maiores eveniet necessitatibus dolorum praesentium! Corrupti, at.",
    isOpen: false,
  },
  {
    heading: "How can it be defined?",
    content: "Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima facilis labore voluptates provident nam, delectus suscipit nihil optio voluptate quae porro fugiat magni excepturi doloribus.",
    isOpen: false,
  },
  {
    heading: "Chamber reached do he nothing be?",
    content: "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam minima maiores magni dolore qui architecto pariatur incidunt repellat quos hic? Eius, eveniet accusantium! Quisquam, quo. Vitae ipsum ad veritatis commodi quasi expedita!",
    isOpen: false,
  }
])
</script>

<template>
  <section class="container mx-auto flex items-center flex-col">
    <div class="w-full p-10 bg-indigo-600">
      <div class="w-3/4 mx-auto rounded border">
        <div class="bg-pink-400 p-10">
          <h3 class="text-lg font-medium text-gray-800">Several Windows stacked on each other</h3>
          <p class="text-sm font-light text-gray-600 my-3">
            The accordion is a graphical control element comprising a vertically stacked list of items such as labels or thumbnails
          </p>

          <div class="h-1 w-full mx-auto border-b my-5"></div>
          <!-- What is term -->
          <div class="transition my-2" v-for="(accordion, index) in accordions" :key="index">
            <!-- header -->
            <div class="accordion-header cursor-pointer transition bg-blue-400 flex space-x-5 px-5 items-center h-16" @click="accordion.isOpen = !accordion.isOpen">
              <h3>{{ accordion.heading }}</h3><span class="text-3xl text-green-800 rounded">{{ accordion.isOpen ? '-' : '+' }}</span>
            </div>
            <!-- Content -->
            <div class="text-left bg-indigo-700">
              <p class="font-light p-3" :class="accordion.isOpen ? '' : 'hidden'">
                {{ accordion.content }}
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>

</style>
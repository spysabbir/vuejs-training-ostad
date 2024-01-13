<script setup>
  // import Chat from './components/Chat.vue'
  // import Modifier from './components/Modifier.vue'
  // import Lightbox from './components/Lightbox.vue';
  import Accordion from './components/Accordion.vue';

  // function doSomething(event) {
  //   console.log(event.target);
  // }
  // function detectKey(event) {
  //   console.log('You press ' + event.key);
  // }
  // function onlyRunEnter() {
  //   console.log('You press enter');
  // }
  // function onlyRunSpace() {
  //   console.log('You press space');
  // }

  // function search() {
  //   console.log('You form submit');
  // }
</script>

<template>
  <section class="mt-10 container mx-auto">
    <h1> Module 05 || Live Class 2 </h1>
    <h2>Events</h2>

    <!-- <section class="mt-10">
      <input type="text" @keypress="detectKey($event)" placeholder="keypress" class="mx-1 p-1">
      <input type="text" @keyup="detectKey($event)" placeholder="keyup" class="mx-1 p-1">
      <input type="text" @keypress.space="onlyRunSpace()" @keypress.enter="onlyRunEnter()" placeholder="keypress.enter/space" class="mx-1 p-1">
      <button type="button" @click="doSomething($event)" class="bg-indigo-400 p-1 mx-2">Do Something</button>
    </section> -->

    <!-- <section class="mt-10">
      <form @submit.prevent="search()" action="https://google.com/search">
        <input type="text" placeholder="keyword" class="mx-1 p-1" name="q">
        <button type="submit" class="bg-blue-500 p-1">Search</button>
      </form>
    </section> -->

    <!-- <section class="mt-10">
      <Chat></Chat>
    </section> -->

    <!-- <section class="mt-10">
      <Modifier></Modifier>
    </section> -->

    <!-- <section class="mt-10">
      <Lightbox></Lightbox>
    </section> -->

    <section class="mt-10">
      <Accordion></Accordion>
    </section>

  </section>
</template>

<style scoped>

</style>

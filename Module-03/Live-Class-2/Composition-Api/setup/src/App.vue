<script setup>
  // import HelloWorld from './components/HelloWorld.vue'
  import TagLine from './components/TagLine.vue'
  import Hero from './components/Hero.vue'
  import Button from './components/Button.vue'
  import Sponsor from './components/Sponsor.vue'

  const message = "Hello VueJs"

  function sayHello() {
    return "Hello Function"
  }
</script>

<template>
  <!-- <h3>{{ message }}</h3>
  <h4>{{ sayHello() }}</h4>
  <HelloWorld msg="Vite + Vue" /> -->

  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
        <TagLine></TagLine>
        <Hero></Hero>
        <Button></Button> 
        <Sponsor></Sponsor> 
    </div>
  </section>
</template>

<style scoped>

</style>

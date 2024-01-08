<script setup>
  // import Image from './components/Image.vue'
  // import Expression from './components/Expression.vue'
  import Class from './components/Class.vue'

  const title = "This is title"
  const description = "This is description"

  const objectData = {
    title: "This is object title",
    description: "This is object description"
  }

  const arrayData = [
    {
      title: "This is array title 1",
      description: "This is array description 1"
    },
    {
      title: "This is array title 2",
      description: "This is array description 2"
    }
  ]

  const htmlData = "<strong>08-Jan-2024</strong>"

  const showAlert = () => {
    alert('Click')
  }
</script>

<template>
  <h1> Module 04 || Live Class 1 </h1>
  <h2>Template syntax, data binding, expression, class</h2>

<!-- <div>
  <h2>{{ title }}</h2>
  <h4>{{ description }}</h4>
  <br>
  <h2 v-text="title"></h2>
  <h4 v-text="description"></h4>
</div> -->

<!-- <div>
  <h2>{{ objectData.title }}</h2>
  <h4>{{ objectData.description }}</h4>
</div> -->

<!-- <div>
  <h2>{{ arrayData[0].title }}</h2>
  <h4>{{ arrayData[0].description }}</h4>
</div> -->

<!-- <span v-html="htmlData"></span> -->

<!-- <button @click="showAlert()">Click</button> -->

<!-- <div>
  <Image></Image>
</div> -->

<!-- <div>
  <Expression></Expression>
</div> -->

<!-- <div>
  <Class></Class>
</div> -->
</template>

<style scoped>

</style>

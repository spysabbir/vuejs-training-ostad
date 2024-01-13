<script setup>
import { ref } from "vue"

const space = ref(0)
const pressed = ref("nothing")

function clicked(){
  alert("Clicked")
}

function shiftClicked(){
  alert("Shift with Clicked")
}

const divClicked = () => {
  alert("Div Clicked")
}

const buttonClicked = () => {
  alert("Button Clicked")
}
</script>

<template>
  <section class="container mx-auto flex items-center flex-col">
    <div class="m-5">
        <!-- <p>Space pressed {{ space }} <span v-if="space<=1">time</span><span v-else>times</span></p> -->
        <p>Space pressed {{ space }} <span v-text="space<=1?'time':'times'"></span></p>
        <input @keypress.space="space++" type="text"  class="border border-gray-500 p-5"  placeholder="Press Space">
    </div>

    <div class="m-5">
        <p>You pressed {{ pressed }}</p>
        <input @keyup="pressed=$event.key" type="text" class="border border-gray-500 p-5"  placeholder="Type Something">
    </div>

    <div class="m-5">
      <p>Button click working only one time</p>
      <button @click.once="clicked()" class="mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >
          Button
      </button>
    </div>

    <div class="m-5">
      <p>First enter shift key than click </p>
      <button @click.shift="shiftClicked()" class="mt-5 bg-blue-500 ml-5 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >
          Shift + Click
      </button>
    </div>


    <form @submit.prevent action="https://google.com/search">
      <p>useing @submit.prevent</p>
      <input type="text" name="q" class="bg-gray-500 p-2 mx-2" value="vuejs">
      <button type="submit" class="mt-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
    </form>

    <div @click="divClicked()" class="bg-indigo-500 w-[500px] h-80 mt-5 flex items-center justify-center"  >
      <button @click.stop="buttonClicked()" class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded" >
        Button
      </button>
    </div>
  </section>
</template>

<style scoped>
</style>
<script setup>
  import { ref } from 'vue';

  // import { customJsData } from "./assets/js/custom"
  // import customJsData from "./assets/js/custom"

  // const message = "Welcome, VueJs 3"
  // function getDate() {
  //   const date = new Date();
  //   return date.toDateString()
  // }

  // const objectData = {
  //   message: "Welcome, VueJs 3",
  //   getDate: function(){
  //     const date = new Date();
  //     return date.toDateString()
  //   },
  //   tasks: ['Write', 'Check', 'Run']
  // }

  // const data = [
  //   {
  //     image: 'https://images.unsplash.com/photo-1523275335684-37898b6baf30?q=80&w=1699&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
  //     name: 'Watch',
  //     price: '$100.00',
  //     url: 'https://spysabbir.com'
  //   },
  //   {
  //     image: 'https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
  //     name: 'Camera',
  //     price: '$75.00',
  //     url: 'https://spysabbir.com'
  //   },
  //   {
  //     image: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
  //     name: 'Headphone',
  //     price: '$50.00',
  //     url: 'https://spysabbir.com'
  //   },
  // ]

  // const image = {
  //   src: 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
  //   alt: 'Headphone',
  //   title: 'https://spysabbir.com'
  // }

  // const number = 19
  // const search = 'zebra'
  // const searchUrl = 'https://unsplash.com/s/photos/'

  // const message = "Welcome, <u>VueJs 3</u>"
  // const tag = '<strong> 6-Jan-2024 </strong>'

  // const location = "Dhaka"
  // const weather = ref("S")
</script>

<template>
  <!-- using-data-in-vuejs -->
  <!-- <h1 class="text-3xl font-bold underline">
    {{ message }}
  </h1>
  <h3 class="text-2xl font-bold underline">
    Today is: {{ getDate() }}
  </h3> -->

  <!-- display-data-from-object-and-array -->
  <!-- <div class="mt-2">
    <h1 class="text-3xl font-bold underline">
      {{ objectData.message }}
    </h1>
    <h3 class="text-2xl font-bold underline">
      Today is: {{ objectData.getDate() }}
    </h3>
    <h4 class="text-2xl font-bold underline">
      You have {{ objectData.tasks.length }} task today
    </h4>
  </div> -->

  <!-- importing-data-from-external-file -->
  <!-- <div class="mt-2">
    <h1 class="text-3xl font-bold underline">
      {{ customJsData.message }}
    </h1>
    <h3 class="text-2xl font-bold underline">
      Today is: {{ customJsData.getDate() }}
    </h3>
    <h4 class="text-2xl font-bold underline">
      You have {{ customJsData.tasks.length }} task today
    </h4>
  </div> -->

  <!-- binding-data-with-html-attribute -->
  <!-- <div>
    <div class="flex p-6 font-mono">
      <div class="flex-none w-48 mb-10 relative z-10 before:absolute before:top-1 before:left-1 before:w-full before:h-full before:bg-teal-400">
        <img :src="data[0].image" :alt="data[0].name" class="absolute z-10 inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
      </div>
      <div class="flex-auto pl-6">
        <div class="relative flex flex-wrap items-baseline pb-6 before:bg-black before:absolute before:-top-6 before:bottom-0 before:-left-60 before:-right-6">
          <h1 class="relative w-full flex-none mb-2 text-2xl font-semibold text-white">
            {{ data[0].name }}
          </h1>
          <h1 class="relative w-full flex-none mb-2 text-2xl font-semibold text-white">
            {{ data[0].price }}
          </h1>
        </div>
        <div class="flex space-x-2 mb-4 text-sm font-medium">
          <a :href="data[0].url" target="_blank" class="bg-pink-700 hover:border-blue-500 hover:border-solid hover:bg-white hover:text-blue-500 group w-full flex flex-col items-center justify-center rounded-md border-2 border-dashed border-slate-300 text-sm leading-6 text-slate-900 font-medium py-3">
            Bye Now
          </a>
        </div>
      </div>
    </div>
    <div class="flex p-6 font-mono">
      <div class="flex-none w-48 mb-10 relative z-10 before:absolute before:top-1 before:left-1 before:w-full before:h-full before:bg-teal-400">
        <img :src="data[1].image" :alt="data[1].name" class="absolute z-10 inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
      </div>
      <div class="flex-auto pl-6">
        <div class="relative flex flex-wrap items-baseline pb-6 before:bg-black before:absolute before:-top-6 before:bottom-0 before:-left-60 before:-right-6">
          <h1 class="relative w-full flex-none mb-2 text-2xl font-semibold text-white">
            {{ data[1].name }}
          </h1>
          <h1 class="relative w-full flex-none mb-2 text-2xl font-semibold text-white">
            {{ data[1].price }}
          </h1>
        </div>
        <div class="flex space-x-2 mb-4 text-sm font-medium">
          <a :href="data[1].url" target="_blank" class="bg-pink-700 hover:border-blue-500 hover:border-solid hover:bg-white hover:text-blue-500 group w-full flex flex-col items-center justify-center rounded-md border-2 border-dashed border-slate-300 text-sm leading-6 text-slate-900 font-medium py-3">
            Bye Now
          </a>
        </div>
      </div>
    </div>
    <div class="flex p-6 font-mono">
      <div class="flex-none w-48 mb-10 relative z-10 before:absolute before:top-1 before:left-1 before:w-full before:h-full before:bg-teal-400">
        <img :src="data[2].image" :alt="data[2].name" class="absolute z-10 inset-0 w-full h-full object-cover rounded-lg" loading="lazy" />
      </div>
      <div class="flex-auto pl-6">
        <div class="relative flex flex-wrap items-baseline pb-6 before:bg-black before:absolute before:-top-6 before:bottom-0 before:-left-60 before:-right-6">
          <h1 class="relative w-full flex-none mb-2 text-2xl font-semibold text-white">
            {{ data[2].name }}
          </h1>
          <h1 class="relative w-full flex-none mb-2 text-2xl font-semibold text-white">
            {{ data[2].price }}
          </h1>
        </div>
        <div class="flex space-x-2 mb-4 text-sm font-medium">
          <a :href="data[2].url" target="_blank" class="bg-pink-700 hover:border-blue-500 hover:border-solid hover:bg-white hover:text-blue-500 group w-full flex flex-col items-center justify-center rounded-md border-2 border-dashed border-slate-300 text-sm leading-6 text-slate-900 font-medium py-3">
            Bye Now
          </a>
        </div>
      </div>
    </div>
  </div> -->
  <!-- <img v-bind="image" class="w-80 h-80 rounded-lg" /> -->

  <!-- javascript-expressions-in-data-binding -->
  <!-- <div>
    <span>{{ number }} / 4 = {{ number / 4 }}</span><br>
    <span>Number is {{ number % 3 == 0 ? 'Even' : 'Odd'}}</span><br>

    <a :href="searchUrl+search.toLowerCase()" target="_blank" class="text-2xl">{{ search.toUpperCase() }}</a><br>
    <a :href="`https://unsplash.com/s/photos/${search.toLowerCase()}`" target="_blank" class="text-2xl">{{ search.toUpperCase() }}</a>
  </div> -->

  <!-- displaying-html -->
  <!-- <span v-html="message"></span><br>
  <span>Today is: <span v-html="tag"></span></span> -->

  <!-- [Logic] if else condition -->
  <!-- <figure class="md:flex bg-slate-100 rounded-xl p-8 md:p-0 dark:bg-slate-800">
    <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" v-if="weather == 'S'" src="https://w7.pngwing.com/pngs/116/940/png-transparent-sun-weather-weather-forecast-sunny-sunshine-forecast-cloudless-warm-summer-shining.png" alt="" width="384" height="512">
    <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" v-else-if="weather == 'PC'" src="https://w7.pngwing.com/pngs/540/96/png-transparent-clouds-sunny-warm-patches-weather-partly-cloudy-symbols-forecast.png" alt="" width="384" height="512">
    <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" v-else-if="weather == 'R'" src="https://cdn2.iconfinder.com/data/icons/weather-flat-14/64/weather07-512.png" alt="" width="384" height="512">
    <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" v-else-if="weather == 'T'" src="https://w7.pngwing.com/pngs/618/88/png-transparent-thunderstorm-lightning-weather-thunderstorm-s-cloud-weather-forecasting-thunder.png" alt="" width="384" height="512">
    <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" v-else src="https://w1.pngwing.com/pngs/209/1003/png-transparent-green-leaf-tropical-cyclone-weather-map-tropical-cyclone-warnings-and-watches-storm-eye-yellow-line.png" alt="" width="384" height="512">
    <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
      <blockquote>
        <p class="text-lg font-medium">
          [Logic] if else condition
        </p>
      </blockquote>
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          {{ location }}
        </div>
        <div class="text-slate-700 dark:text-slate-500">
          <span v-if="weather == 'S'">Weather: Sunny</span>
          <span v-else-if="weather == 'PC'">Weather: Partly Cloudy</span>
          <span v-else-if="weather == 'R'">Weather: Rainy</span>
          <span v-else-if="weather == 'T'">Weather: Thunderstorm</span>
          <span v-else>Weather: Cyclone</span>
        </div>
      </figcaption>
    </div>
  </figure> -->

  <!-- v-show -->
  <!-- <figure class="md:flex bg-slate-100 rounded-xl p-8 md:p-0 dark:bg-slate-800">
    <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" v-show="weather == 'S'" src="https://w7.pngwing.com/pngs/116/940/png-transparent-sun-weather-weather-forecast-sunny-sunshine-forecast-cloudless-warm-summer-shining.png" alt="" width="384" height="512">
    <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" v-show="weather == 'PC'" src="https://w7.pngwing.com/pngs/540/96/png-transparent-clouds-sunny-warm-patches-weather-partly-cloudy-symbols-forecast.png" alt="" width="384" height="512">
    <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" v-show="weather == 'R'" src="https://cdn2.iconfinder.com/data/icons/weather-flat-14/64/weather07-512.png" alt="" width="384" height="512">
    <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" v-show="weather == 'T'" src="https://w7.pngwing.com/pngs/618/88/png-transparent-thunderstorm-lightning-weather-thunderstorm-s-cloud-weather-forecasting-thunder.png" alt="" width="384" height="512">
    <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" v-show="weather == 'C'" src="https://w1.pngwing.com/pngs/209/1003/png-transparent-green-leaf-tropical-cyclone-weather-map-tropical-cyclone-warnings-and-watches-storm-eye-yellow-line.png" alt="" width="384" height="512">
    <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
      <blockquote>
        <p class="text-lg font-medium">
          [Logic] if else condition
        </p>
      </blockquote>
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          {{ location }}
        </div>
        <div class="text-slate-700 dark:text-slate-500">
          <span v-show="weather == 'S'">Weather: Sunny</span>
          <span v-show="weather == 'PC'">Weather: Partly Cloudy</span>
          <span v-show="weather == 'R'">Weather: Rainy</span>
          <span v-show="weather == 'T'">Weather: Thunderstorm</span>
          <span v-show="weather == 'C'">Weather: Cyclone</span>
        </div>
      </figcaption>
    </div>
  </figure> -->

  <!-- v-if items grouping with template tag -->
  <!-- <figure class="md:flex bg-slate-100 rounded-xl p-8 md:p-0 dark:bg-slate-800">
    <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
      <blockquote>
        <p class="text-lg font-medium">
          [Logic] if else condition
        </p>
      </blockquote>
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400 text-center mb-3">
          {{ location }}
        </div>
        <div class="text-slate-700 dark:text-slate-500">
          <template v-if="weather == 'S'">
            <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="https://w7.pngwing.com/pngs/116/940/png-transparent-sun-weather-weather-forecast-sunny-sunshine-forecast-cloudless-warm-summer-shining.png" alt="" width="384" height="512">
            <p class="text-center mt-2">Weather: Sunny</p>
          </template>

          <template v-if="weather == 'PC'">
            <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="https://w7.pngwing.com/pngs/540/96/png-transparent-clouds-sunny-warm-patches-weather-partly-cloudy-symbols-forecast.png" alt="" width="384" height="512">
            <p class="text-center mt-2">Weather: Partly Cloudy</p>
          </template>

          <template v-if="weather == 'R'">
            <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="https://cdn2.iconfinder.com/data/icons/weather-flat-14/64/weather07-512.png" alt="" width="384" height="512">
            <p class="text-center mt-2">Weather: Rainy</p>
          </template>

          <template v-if="weather == 'T'">
            <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="https://w7.pngwing.com/pngs/618/88/png-transparent-thunderstorm-lightning-weather-thunderstorm-s-cloud-weather-forecasting-thunder.png" alt="" width="384" height="512">
            <p class="text-center mt-2">Weather: Thunderstorm</p>
          </template>

          <template v-if="weather == 'C'">
            <img class="w-24 h-24 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="https://w1.pngwing.com/pngs/209/1003/png-transparent-green-leaf-tropical-cyclone-weather-map-tropical-cyclone-warnings-and-watches-storm-eye-yellow-line.png" alt="" width="384" height="512">
            <p class="text-center mt-2">Weather: Cyclone</p>
          </template>
        </div>
      </figcaption>
    </div>
  </figure> -->

  <!-- difference between v-if and v-show -->
  <!-- <input type="text" placeholder="Weather Status" class="text-center p-5" v-model="weather"> -->
</template>

<style scoped>

</style>

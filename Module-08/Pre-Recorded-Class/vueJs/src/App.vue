<script setup>
  import { ref, reactive } from 'vue';
  import { countries } from './data/countries.js'

  import Invoice from './components/Invoice.vue'

  // const color = ref('red')
  // function getStyle() {
  //   return {
  //     backgroundColor: color.value
  //   }
  // }

  // const person = reactive({
  //   name: "Sabbir Ahammed",
  //   age: 26,
  //   job: "Web Developer",
  // })

  // const displayImage = ref(true)

  // const displayImage = ref(true)

  // const favColor = ref([])

  // const score = ref(0);
  // const questionsAns = reactive([
  //   { name: "Bangladesh", capital: "Dhaka" },
  //   { name: "India", capital: "New Dhlhi" },
  //   { name: "Nepal", capital: "Kathmandu" },
  //   { name: "Bhutan", capital: "Thimphu" },
  //   { name: "Sri Lanka", capital: "Colombo" },
  // ]);
  // const capitals = ["Dhaka", "New Dhlhi", "Kathmandu", "Thimphu", "Colombo"]
  // function getRandomCapitals(){
  //   return capitals.sort(() => Math.random() - 0.5)
  // }
  // function getScore() {
  //   let score = 0;
  //   questionsAns.forEach((question) => {
  //     if (question.answer === question.capital) {
  //       score++;
  //     }
  //   });
  //   return score;
  // }

  // const persons = reactive([
  //   {name: "Sabbir", age: 26, email: "sabbir@gmail.com"},
  //   {name: "Sovon", age: 24, email: "sovon@gmail.com"},
  //   {name: "Alif", age: 28, email: "alif@gmail.com"},
  // ])
  // const activeIndex = ref(0)

  // const search = ref('')
  // function getFilteredCountries() {
  //   return countries.filter(country => {
  //     return country.toLowerCase().startsWith(search.value.toLowerCase())
  //   })
  // }

</script>

<template>
  <!-- episode 01 - introduction to two way data binding and v-model -->
  <!-- <div class="container mx-auto">
    <span>Your Favorite Color: {{ color }}</span>
    <div>
      <label>Color Name</label>
      <input type="text" class="mx-2 px-2" v-model="color">
    </div>
    <div class="w-32 h-32 mt-5" :style="getStyle()"></div>
  </div> -->
  
  <!-- episode 02 - two way data binding and objects -->
  <!-- <div class="container mx-auto">
    <span>{{ person }}</span>
    <div class="flex flex-col" v-for="(value, key, index) in person" :key="index">
      <label>{{ key }}</label>
      <input type="text" class="mx-2 px-2" v-model="person[key]">
    </div>
  </div> -->

  <!-- episode 03 - two way data binding with checkbox -->
  <!-- <div class="container mx-auto">
    <span>{{ displayImage }}</span>
    <div class="flex flex-col mb-3">
      <label>Random Image</label>
      <input type="checkbox" class="mx-2 px-2" v-model="displayImage">
    </div>
    <img v-show="displayImage" :src="`https://source.unsplash.com/random?version=${Math.random()}`" class="w-96 h-96" alt="Image">
  </div> -->

  <!-- episode 04 - two way data binding with radio box -->
  <!-- <div class="container mx-auto">
    <span>{{ displayImage }}</span>
    <div class="flex flex-col mb-3">
      <label>Random Image</label>
      <input type="radio" class="mx-2 px-2" :value="true" name="displayImage" v-model="displayImage"> On
      <input type="radio" class="mx-2 px-2" :value="false" name="displayImage" v-model="displayImage"> Off
    </div>
    <img v-show="displayImage" :src="`https://source.unsplash.com/random?version=${Math.random()}`" class="w-96 h-96" alt="Image">
  </div> -->

  <!-- episode 05 - two way data binding multiple checkbox array -->
  <!-- <div class="container mx-auto">
    <span>{{ favColor }}</span>
    <div class="flex flex-col mb-3">
      <label>Favorite Color</label>
      <input type="checkbox" class="mx-2 px-2" value="Red" v-model="favColor"> Red
      <input type="checkbox" class="mx-2 px-2" value="Blue" v-model="favColor"> Blue
      <input type="checkbox" class="mx-2 px-2" value="Green" v-model="favColor"> Green
    </div>
  </div> -->

  <!-- episode 06 - a simple quiz project -->
  <!-- <div>
    <p class="p-4">All Data: {{ questionsAns }}</p>
    <p class="p-4">Your Score: {{ getScore() }}</p>
    <div v-for="(question, index) in questionsAns" :key="index" class="border rounded p-4 gap-10">
      <p class="p-1">What is the capital of {{ question.name }}</p>
      <div class="flex" v-for="(capital, index) in getRandomCapitals()" :key="index">
        <input :name="question.name" class="pr-2" type="radio" :value="capital" v-model="question.answer"/>
        <label class="pl-2">{{ capital }}</label>
      </div>
    </div>
  </div> -->

  <!-- episode 07 - dynamic content editing using two way data binding -->
  <!-- <div>
    <p class="p-4">All Person: {{ persons }}</p>

    <div>
      <label class="pl-2">Person {{ activeIndex }}</label>
      <div class="flex flex-row">
        <div class="w-1/2">
          <select class="" v-model="activeIndex">
            <option value="">Select Name</option>
            <option :value="index" v-for="(person, index) in persons" :key="index">{{ person.name }}</option>
          </select>
        </div>
        <div class="w-1/2 flex flex-col">
          <input type="text" :placeholder="key" v-model="persons[activeIndex][key]" v-for="(value, key, index2) in persons[activeIndex]" :key="index2" class="m-2">
        </div>
      </div>
    </div>
  </div> -->

  <!-- episode 08 - dynamic search -->
  <!-- <div>
    <span class="m-2">{{ search }}</span>
    <div class="mb-3 bg-gray-700 p-2">
      <label>Search</label>
      <input class="mx-1 bg-pink-200 px-1" type="text" v-model="search">
    </div>
    <ul>
      <li class="p-1 m-1 bg-gray-400" v-for="country in getFilteredCountries()" :key="country">{{ country }}</li>
    </ul>
  </div> -->

  <!-- invoice App -->
  <Invoice></Invoice>
</template>

<style scoped>

</style>

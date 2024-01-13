<script setup>
import { ref, reactive } from 'vue'

// const bgOrange = 'bg-orange-400'
// const bgIndigo = 'bg-indigo-400'
// const bgGreen = 'bg-green-400'

// const weekday = false

// // success
// const alertColor = {
//   bgColor: 'bg-teal-200',
//   borderColor: 'border-teal-500',
//   textColor: 'text-teal-900',
// }
// const alertType = 'warning'
// if('error' == alertType) {
//   alertColor.bgColor = 'bg-red-200'
//   alertColor.borderColor = 'border-red-500'
//   alertColor.textColor = 'text-red-900'
// }
// if('warning' == alertType) {
//   alertColor.bgColor = 'bg-orange-200'
//   alertColor.borderColor = 'border-orange-500'
//   alertColor.textColor = 'text-orange-900'
// }

// const bgOrange = 'background-color: rgba(251, 146, 60, 1)'
// const bgIndigo = 'background-color: rgba(129, 140, 248, 1)'
// const bgGreen = 'background-color: rgba(52, 211, 153, 1)'
// const bgRed = 'background-color: rgba(220, 38, 38, 1)'
// const bgDarkGreen = 'background-color: rgba(5, 150, 105, 1)'

// const weekday = true

// // success
// const alertColor = {
//   backgroundColor: 'rgba(20, 184, 166, 1)',
//   borderColor: 'rgba(19, 78, 74, 1)',
//   color: 'rgba(204, 251, 241, 1)',
// }
// const alertType = 'error'
// if('error' == alertType) {
//   alertColor.backgroundColor = 'rgba(254, 226, 226, 1)'
//   alertColor.borderColor = 'rgba(239, 68, 68, 1)'
//   alertColor.color = 'rgba(127, 29, 29, 1)'
// }

// const items = [1, 2, 3, 4, 5]

// const tasks = [
//   'Create',
//   'Cooding',
//   'Running',
//   'Testing',
//   'Deploy',
// ]

// const tasks = [
//   { id: 1, title: 'Create', status: 'Pending' },
//   { id: 2, title: 'Codeing', status: 'Progressing' },
//   { id: 3, title: 'Running', status: 'Completed' },
//   { id: 4, title: 'Testing', status: 'Progressing' },
//   { id: 5, title: 'Deploy', status: 'Pending' },
// ]
// function getCompletedTask() {
//   return tasks.filter(task=>'Completed' == task.status)
// }
// function getProgressingTask() {
//   return tasks.filter(task=>'Progressing' == task.status)
// }

// const teams = [
//   {
//     id: 1,
//     img: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png',
//     name: 'Bonnie Green',
//     title: 'CEO/Co-founder'
//   },
//   {
//     id: 2,
//     img: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/helene-engels.png',
//     name: 'Helene Engels',
//     title: 'CTO/Co-founder'
//   },
//   {
//     id: 3,
//     img: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/jese-leos.png',
//     name: 'Jese Leos',
//     title: 'SEO & Marketing'
//   },
//   {
//     id: 4,
//     img: 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png',
//     name: 'Joseph Mcfall',
//     title: 'Sales'
//   },
// ]

// const weathers = [
//   {title: "Sunny", icon: 'https://w7.pngwing.com/pngs/267/400/png-transparent-free-content-blog-sunny-weather-cloud-hand-website.png'},
//   {title: "Thunderstorm", icon: 'https://w7.pngwing.com/pngs/618/88/png-transparent-thunderstorm-lightning-weather-thunderstorm-s-cloud-weather-forecasting-thunder.png'},
//   {title: "Partly Cloudy", icon: 'https://w7.pngwing.com/pngs/540/96/png-transparent-clouds-sunny-warm-patches-weather-partly-cloudy-symbols-forecast.png'},
//   {title: "Rainy", icon: 'https://w7.pngwing.com/pngs/397/536/png-transparent-rainy-day-clouds-rain-the-weather-thumbnail.png'}
// ]

// const location = ref('Dhaka')
// function changeLocation(newLocation) {
//   location.value = newLocation
// }

// const location = reactive({
//   name: 'Dhaka',
//   weather: 'Sunny'
// })
// function changeLocation(newLocation) {
//   location.name = newLocation
// }

// const accordionIndex = ref(0)

// const accordion = reactive([
//   false,false,false
// ])
// function toggol(index) {
//   accordion[index] = !accordion[index]
// }

// const activeIndex = ref(0)
// const accordions = reactive([
//   {
//     title: 'What is Flowbite? 1',
//     disc: 'Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.',
//     status: false
//   },
//   {
//     title: 'What is Flowbite? 2',
//     disc: 'Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.',
//     status: false
//   },
//   {
//     title: 'What is Flowbite? 3',
//     disc: 'Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.',
//     status: false
//   },
//   {
//     title: 'What is Flowbite? 4',
//     disc: 'Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.',
//     status: false
//   },
//   {
//     title: 'What is Flowbite? 5',
//     disc: 'Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.',
//     status: false
//   },
// ])

// const fullImg = ref('https://images.pexels.com/photos/19737002/pexels-photo-19737002/free-photo-of-stairs.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load')
// const carouselImages = [
//   {
//     thumb: 'https://images.pexels.com/photos/19737002/pexels-photo-19737002/free-photo-of-stairs.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
//     full: 'https://images.pexels.com/photos/19737002/pexels-photo-19737002/free-photo-of-stairs.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
//   },
//   {
//     thumb: 'https://images.pexels.com/photos/19652396/pexels-photo-19652396/free-photo-of-riva-del-garda.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
//     full: 'https://images.pexels.com/photos/19652396/pexels-photo-19652396/free-photo-of-riva-del-garda.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
//   },
//   {
//     thumb: 'https://images.pexels.com/photos/13972469/pexels-photo-13972469.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
//     full: 'https://images.pexels.com/photos/13972469/pexels-photo-13972469.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
//   },
//   {
//     thumb: 'https://images.pexels.com/photos/13280779/pexels-photo-13280779.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
//     full: 'https://images.pexels.com/photos/13280779/pexels-photo-13280779.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load',
//   },
// ]
// function setImg(image) {
//   fullImg.value = image.full
// }

// const about = ref('')
// const links = [
//   {
//     title: 'Google',
//     link: 'https://google.com',
//     about: "Hello Google"
//   },
//   {
//     title: 'Facebook',
//     link: 'https://facebook.com',
//     about: "Hello Facebook"
//   },
//   {
//     title: 'Vue',
//     link: 'https://vue.com',
//     about: "Hello Vue"
//   },
// ]
// function setText(text){
//   about.value = text
// }

const message = ref('Hello Vue')
const space = ref(0)

function spaceCount() {
  space.value++
  message.value = 'Space count ' + space.value
}
function checkKey(event) {
  message.value = 'You type ' + event.key
}
function btnPress() {
  message.value = 'You click btn'
}
function ctrlRightClick() {
  message.value = 'You (ctrl + right btn) click'
}

function divClick(){
  alert('You div click')
}
function btnClick() {
  alert('You under div btn click')
}
</script>

<template>
  <section class="container mx-auto">
    <!-- Class Binding -->
    <!-- <section class="flex space-x-10">
      <div class="w-1/3 h-16" :class="bgOrange">bg-orange-400</div>
      <div class="w-1/3 h-16" :class="bgIndigo">bg-indigo-400</div>
      <div class="w-1/3 h-16" :class="bgGreen">bg-green-400</div>
    </section> -->

    <!-- <section class="mt-10">
      <div class="h-16 flex item-center justify-center text-white mb-2" :class="weekday ? 'bg-red-400 text-2xl' : 'bg-blue-400 text-4xl'">It's a weekday</div>
      <div class="h-16 flex item-center justify-center text-white" :class="[weekday ? 'bg-blue-400' : 'bg-red-400', weekday == false? 'text-2xl' : 'text-4xl']">It's a weekday</div>
    </section> -->

    <!-- <section class="mt-10">
      <div class="border-t-4 rounded-b px-4 py-3 shadow-md" :class="[alertColor.bgColor, alertColor.borderColor, alertColor.textColor]">
        <p class="font-bold">Our privacy policy has changed.</p>
        <p class="text-sm">Make sure you know how these change affect you.</p>
      </div>
    </section> -->
  
    <!-- Style Binding -->
    <!-- <section class="flex space-x-10">
      <div class="w-1/3 h-16" :style="bgOrange">bg-orange-400</div>
      <div class="w-1/3 h-16" :style="bgIndigo">bg-indigo-400</div>
      <div class="w-1/3 h-16" :style="bgGreen">bg-green-400</div>
    </section> -->

    <!-- <section class="mt-10">
      <div class="h-16 flex item-center justify-center text-white mb-2" :style="weekday ? bgRed : bgDarkGreen">It's a weekday</div>
      <div class="h-16 flex item-center justify-center text-white mb-2" :style="weekday ? [bgDarkGreen, 'font-size: 20px'] : [bgRed , 'font-size: 28px']">It's a weekday</div>
    </section> -->

    <!-- <section class="mt-10">
      <div class="border-t-4 rounded-b px-4 py-3 shadow-md" :style="alertColor">
        <p class="font-bold">Our privacy policy has changed.</p>
        <p class="text-sm">Make sure you know how these change affect you.</p>
      </div>
    </section> -->
  
    <!-- simple loop or list rendering -->
    <!-- <section class="mt-10 flex items-center text-center flex-col space-y-2">
      <div class="p-5 border border-gray-600 w-20" v-for="item in items">{{ item }}</div>
    </section> -->

    <!-- display index in loop -->
    <!-- <section class="mt-10 flex items-center text-center flex-col space-y-2">
      <div class="p-5 border border-gray-600 w-40" v-for="(task, index) in tasks">{{ index+1 }}. {{ task }}</div>
    </section> -->

    <!-- displaying objects and filtered objects in a loop -->
    <!-- <section class="mt-10 flex items-center text-center flex-col space-y-2">
      <div class="p-5 border border-gray-600 w-40" v-for="task in tasks" :key="task.id">{{ task.id }}.{{ task.title }} - <span class="text-blue-400">{{ task.status }}</span></div>

      <div class="p-5 border border-gray-600 w-40" v-for="task in getCompletedTask()" :key="task.id">{{ task.id }}.{{ task.title }} - <span class="text-blue-400">{{ task.status }}</span></div>

      <div class="p-5 border border-gray-600 w-40" v-for="task in getProgressingTask()" :key="task.id">{{ task.id }}.{{ task.title }} - <span class="text-blue-400">{{ task.status }}</span></div>
    </section> -->

    <!-- display team members using a loop -->
    <!-- <section class="bg-white dark:bg-gray-900">
      <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
          <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
              <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Our team</h2>
              <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p>
          </div> 
          <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
              <div class="text-center text-gray-500 dark:text-gray-400" v-for="team in teams" :key="team.id">
                  <img class="mx-auto mb-4 rounded-full" :class="2 == team.id || 3 == team.id ? 'w-48 h-48' : 'w-36 h-36'" :src="team.img" alt="Bonnie Avatar">
                  <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                      <a href="#">{{ team.name }}</a>
                  </h3>
                  <p>{{ team.title }}</p>
              </div>
          </div>  
      </div>
    </section> -->

    <!-- grouping items using template tag in a loop -->
    <!-- <section class="mt-10">
      <div class="space-y-3 p-5 border border-gray-500 w-80 flex flex-col items-center">
        <template v-for="weather in weathers" :key="weather.icon">
          <h2 class="text-2xl">{{ weather.title }}</h2>
          <img class="w-32" :src="weather.icon" :alt="weather.title">
        </template>
      </div>
    </section> -->
  
    <!-- introduction to event and reactivity -->
    <!-- <section class="mt-10">
      <div>
        <button type="button" class="bg-indigo-400 p-3 mx-3" @click="changeLocation('Dhaka')">Dhaka</button>
        <button type="button" class="bg-indigo-400 p-3 mx-3" @click="changeLocation('Khulna')">Khulna</button>
      </div>
      <p>Current Location: {{ location }}</p>
    </section> -->

    <!-- making objects reactive -->
    <!-- <section class="mt-10">
      <div>
        <button type="button" class="bg-indigo-400 p-3 mx-3" @click="changeLocation('Dhaka')">Dhaka</button>
        <button type="button" class="bg-indigo-400 p-3 mx-3" @click="changeLocation('Khulna')">Khulna</button>
      </div>
      <p>Current Location: {{ location.name }}</p>
    </section> -->
 
    <!-- creating an accordion -->
    <!-- <section class="mt-10">
      <div>
        <h2 @click="accordionIndex=0">
          <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3">
            <span>What is Flowbite?</span>
            <svg data-accordion-icon class="w-3 h-3 shrink-0" :class="accordionIndex == 0 ? 'rotate-180' : 'rotate-90'" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
          </button>
        </h2>
        <div :class="accordionIndex == 0 ? '' : 'hidden'">
          <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
            <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
          </div>
        </div>
        <h2 @click="accordionIndex=1">
          <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3">
            <span>Is there a Figma file available?</span>
            <svg data-accordion-icon class="w-3 h-3 shrink-0" :class="accordionIndex == 1 ? 'rotate-180' : 'rotate-90'" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
          </button>
        </h2>
        <div :class="accordionIndex == 1 ? '' : 'hidden'">
          <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
            <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
          </div>
        </div>
        <h2 @click="accordionIndex=2">
          <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3">
            <span>What are the differences between Flowbite and Tailwind UI?</span>
            <svg data-accordion-icon class="w-3 h-3 shrink-0" :class="accordionIndex == 2 ? 'rotate-180' : 'rotate-90'" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
          </button>
        </h2>
        <div :class="accordionIndex == 2 ? '' : 'hidden'">
          <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
            <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
          </div>
        </div>
      </div>
    </section> -->
 
    <!-- reactive array -->
    <!-- <section class="mt-10">
      <div>
        <h2 @click="toggol(0)">
          <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3">
            <span>What is Flowbite?</span>
            <svg data-accordion-icon class="w-3 h-3 shrink-0 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
          </button>
        </h2>
        <div v-show="accordion[0]">
          <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
            <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
          </div>
        </div>
        <h2 @click="toggol(1)">
          <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3">
            <span>Is there a Figma file available?</span>
            <svg data-accordion-icon class="w-3 h-3 shrink-0 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
          </button>
        </h2>
        <div v-show="accordion[1]">
          <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
            <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
          </div>
        </div>
        <h2 @click="accordion[2]=!accordion[2]">
          <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3">
            <span>What are the differences between Flowbite and Tailwind UI?</span>
            <svg data-accordion-icon class="w-3 h-3 shrink-0 rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
          </button>
        </h2>
        <div v-show="accordion[2]">
          <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
            <p class="text-gray-500 dark:text-gray-400">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
          </div>
        </div>
      </div>
    </section> -->

    <!-- loop, events and reactivity -->
    <!-- <section class="mt-10">
      <div>
        <template v-for="accordion in accordions" :key="accordion.title">
          <div @click="accordion.status=!accordion.status">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3">
              <span>{{ accordion.title }}</span>
              <svg data-accordion-icon class="w-3 h-3 shrink-0" :class="accordion.status == true ? 'rotate-180' : 'rotate-90'" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
              </svg>
            </button>
          </div>
          <div :class="accordion.status == true ? '' : 'hidden'">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
              <p class="mb-2 text-gray-500 dark:text-gray-400">{{ accordion.disc }}</p>
            </div>
          </div>
        </template>
      </div>
    </section> -->

    <!-- <section class="mt-10">
      <div>
        <template v-for="(accordion, index) in accordions" :key="accordion.title">
          <div @click="activeIndex=index">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3">
              <span>{{ accordion.title }}</span>
              <svg data-accordion-icon class="w-3 h-3 shrink-0" :class="accordion.status == true ? 'rotate-180' : 'rotate-90'" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
              </svg>
            </button>
          </div>
          <div :class="index == activeIndex ? '' : 'hidden'">
            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
              <p class="mb-2 text-gray-500 dark:text-gray-400">{{ accordion.disc }}</p>
            </div>
          </div>
        </template>
      </div>
    </section> -->

    <!-- simple image carousel -->
    <!-- <section class="mt-10">
      <div class="flex items-center text-center space-y-2">
        <img :src="item.thumb" alt="" @click="setImg(item)" class="w-48 h-48 m-3 cursor-pointer" v-for="item in carouselImages" :key="item.thumb">
      </div>
      <div>
        <img class="w-80 h-80" :src="fullImg" alt="">
      </div>
    </section> -->

    <!-- event modifier -->
    <!-- <section class="mt-10">
    <h2 class="mt-10">{{ about }}</h2>
    <div class="container mx-auto flex space-x-5 justify-center m-[100px]">
      <a href="#" class="text-white mx-3" v-for="link in links" :key="link.title" @click.prevent="setText(link.about)">{{ link.title }}</a>
    </div>
    </section> -->
 
    <!-- advanced event modifiers -->
    <section class="mt-10">
      <h2 class="mb-3">{{ message }}</h2>
      <div class="flex flex-col">
        <div class="my-3">
          <label>Enter Space: </label>
          <input type="text" @keyup.space="spaceCount()">
        </div>
        <div class="my-3">
          <label>Enter any key: </label>
          <input type="text" @keyup="checkKey($event)">
        </div>
        <div class="my-3">
          <form action="https://google.com/search">
            <label>Google search: </label>
            <input type="text" >
            <button type="button" @click.prevent="btnPress()" class="bg-blue-400 p-2 m-2">Search</button>
          </form>
        </div>
        <div class="my-3">
          <button type="button" @click.ctrl.right="ctrlRightClick()" class="bg-blue-400 p-2 m-2">Ctrl + Right Click</button>
        </div>
        <div class="my-3">
          <div class="w-80 h-80 bg-pink-400" @click="divClick()">
            <button type="button" @click.stop="btnClick()" class="bg-yellow-400 p-2 m-2">Btn</button>
          </div>
        </div>
      </div>
    </section>
 </section>
</template>

<style scoped>

</style>

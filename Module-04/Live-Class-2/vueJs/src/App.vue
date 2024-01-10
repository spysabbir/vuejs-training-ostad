<script setup>
  import { ref } from 'vue'

  // const disc = "The best free stock photos, royalty free images & videos shared by creators. The best free stock photos, royalty free images & videos shared by creators."
  // const imgUrl = "https://images.pexels.com/photos/19792092/pexels-photo-19792092/free-photo-of-wood-writing-typography-tiles.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load"
  // const width = 500
  // const title = "Scrabble letters spelling out sex on a wooden table"
  // const classColorRed = 'text-red-500'
  // const cssBackgroundColorBlue = 'background-color: blue'

  // const displayText = ref(true)
  // const displayImage = ref(true)

  // const favColor ='blue'

  // const activeCountry = ref('Bangladesh')

  // function setActiveCountry() {
  //   const userInput = prompt('Enter Country Name')
  //   activeCountry.value = userInput
  // }

  // const showCart = ref(false)

  const activeIndex = ref(0)
</script>

<template>
  <h1> Module 04 || Live Class 2 </h1>
  <h2>Logic</h2>
  <!-- <div>
    <h2 class="text-2xl" :class="classColorRed" :style="cssBackgroundColorBlue">{{ title }}</h2>
    <img :alt="title" :src="imgUrl" :width="width" />
    <p>{{ disc }}</p>
  </div> -->

  <!-- <div>
    <h2 class="text-2xl" :class="classColorRed" :style="cssBackgroundColorBlue">{{ title }}</h2>
    <img v-if="displayImage" :alt="title" :src="imgUrl" :width="width" />
    <p v-if="displayText">{{ disc }}</p>

    <img v-show="displayImage" :alt="title" :src="imgUrl" :width="width" />
    <p v-show="displayText">{{ disc }}</p>
  </div> -->

  <!-- <div>
    <p v-if="favColor == 'red'">I love red</p>
    <p v-else-if="favColor == 'green'">I love green</p>
    <p v-else-if="favColor == 'blue'">I love blue</p>
    <p v-else>i love black</p>
  </div> -->

  
  <!-- <div>
    <button type="button" @click="displayImage = !displayImage" class="bg-green-400 text-white py-2 px-4 rounded mr-3 mb-3">Hide/Show Image</button>
    <button type="button" @click="displayText = !displayText" class="bg-blue-400 text-white py-2 px-4 rounded mb-3">Hide/Show Text</button>

    <img v-if="displayImage" :alt="title" :src="imgUrl" :width="width" />
    <p v-if="displayText">{{ disc }}</p>
  </div> -->

  <!-- <div>
    <h1 class="text-2xl">Country Information {{ activeCountry }}</h1>
    <ul>
      <li class="p-5" v-show="activeCountry == 'Bangladesh'">
        <h3><strong>Bangladesh</strong></h3>
        <p><strong>Capital: </strong>Dhaka</p>
        <p><strong>Population: </strong>169.4 million (2021)</p>
        <p><strong>Area: </strong>148,460 km²</p>
      </li>
      <li class="p-5" v-show="activeCountry == 'India'">
        <h3><strong>India</strong></h3>
        <p><strong>Capital: </strong>New Delhi</p>
        <p><strong>Population: </strong>1.408 billion (2021)</p>
        <p><strong>Area: </strong>3.287 million km²</p>
      </li>
      <li class="p-5" v-show="activeCountry == 'Nepal'">
        <h3><strong>Nepal</strong></h3>
        <p><strong>Capital: </strong>Kathmandu</p>
        <p><strong>Population: </strong>30.03 million (2021)</p>
        <p><strong>Area: </strong>147,181 km²</p>
      </li>
      <li class="p-5" v-show="activeCountry == 'Bhutan'">
        <h3><strong>Bhutan </strong></h3>
        <p><strong>Capital: </strong>Thimphu</p>
        <p><strong>Population: </strong>777,486 (2021)</p>
        <p><strong>Area: </strong>38,394 km²</p>
      </li>
    </ul>
    <button type="button" @click="setActiveCountry()" class="bg-blue-400 text-white py-2 px-4 rounded mb-3">Set Country</button>
    <button type="button" @click="activeCountry='Bangladesh'" class="bg-green-400 text-white py-2 px-4 rounded mr-3">Bangladesh</button>
    <button type="button" @click="activeCountry='India'" class="bg-red-400 text-white py-2 px-4 rounded mr-3">India</button>
    <button type="button" @click="activeCountry='Nepal'" class="bg-yellow-400 text-white py-2 px-4 rounded mr-3">Nepal</button>
    <button type="button" @click="activeCountry='Bhutan'" class="bg-blue-400 text-white py-2 px-4 rounded mb-3">Bhutan</button>
  </div> -->

  <!-- <div>
    <div class="relative z-10" aria-labelledby="slide-over-title" role="dialog" aria-modal="true">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
        <button @click="showCart=true" type="button" class="rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base">Cart</button>
      </div>
      <div v-show="showCart" class="pointer-events-none fixed inset-y-0 right-0 flex max-w-full pl-10">
        <div class="pointer-events-auto w-screen max-w-md">
          <div class="flex h-full flex-col overflow-y-scroll bg-white shadow-xl">
            <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
              <div class="flex items-start justify-between">
                <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">Shopping cart</h2>
                <div class="ml-3 flex h-7 items-center">
                  <button @click="showCart=false" type="button" class="relative -m-2 p-2 text-gray-400 hover:text-gray-500">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Close panel</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </button>
                </div>
              </div>

              <div class="mt-8">
                <div class="flow-root">
                  <ul role="list" class="-my-6 divide-y divide-gray-200">
                    <li class="flex py-6">
                      <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                        <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-01.jpg" alt="Salmon orange fabric pouch with match zipper, gray zipper pull, and adjustable hip belt." class="h-full w-full object-cover object-center">
                      </div>

                      <div class="ml-4 flex flex-1 flex-col">
                        <div>
                          <div class="flex justify-between text-base font-medium text-gray-900">
                            <h3>
                              <a href="#">Throwback Hip Bag</a>
                            </h3>
                            <p class="ml-4">$90.00</p>
                          </div>
                          <p class="mt-1 text-sm text-gray-500">Salmon</p>
                        </div>
                        <div class="flex flex-1 items-end justify-between text-sm">
                          <p class="text-gray-500">Qty 1</p>

                          <div class="flex">
                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li class="flex py-6">
                      <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                        <img src="https://tailwindui.com/img/ecommerce-images/shopping-cart-page-04-product-02.jpg" alt="Front of satchel with blue canvas body, black straps and handle, drawstring top, and front zipper pouch." class="h-full w-full object-cover object-center">
                      </div>

                      <div class="ml-4 flex flex-1 flex-col">
                        <div>
                          <div class="flex justify-between text-base font-medium text-gray-900">
                            <h3>
                              <a href="#">Medium Stuff Satchel</a>
                            </h3>
                            <p class="ml-4">$32.00</p>
                          </div>
                          <p class="mt-1 text-sm text-gray-500">Blue</p>
                        </div>
                        <div class="flex flex-1 items-end justify-between text-sm">
                          <p class="text-gray-500">Qty 1</p>

                          <div class="flex">
                            <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">Remove</button>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="border-t border-gray-200 px-4 py-6 sm:px-6">
              <div class="flex justify-between text-base font-medium text-gray-900">
                <p>Subtotal</p>
                <p>$262.00</p>
              </div>
              <p class="mt-0.5 text-sm text-gray-500">Shipping and taxes calculated at checkout.</p>
              <div class="mt-6">
                <a href="#" class="flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-6 py-3 text-base font-medium text-white shadow-sm hover:bg-indigo-700">Checkout</a>
              </div>
              <div class="mt-6 flex justify-center text-center text-sm text-gray-500">
                <p>
                  or
                  <button type="button" class="font-medium text-indigo-600 hover:text-indigo-500">
                    Continue Shopping
                    <span aria-hidden="true"> &rarr;</span>
                  </button>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> -->

<div>
  <div class="relative mx-auto w-full py-16 px-5 font-sans text-white-800">
    <h2 class="mb-5 text-center font-sans text-4xl font-bold">Frequently asked Questions</h2>
    <div class="flex flex-col gap-4">
      <div class="flex flex-col gap-2 border border-white-400">
        <div class="p-5 border border-blue-400" @click="activeIndex=0">
          <h3 class="text-sm text-white-600 cursor-pointer">Is there a free trial with Appsy?</h3>
        </div>
        <div class="p-5" v-show="activeIndex==0">
          <p class="text-sm">Lorem ipsum, consectetur adipisicing elit. Adipisci eligendi, recusandae voluptatum distinctio facilis necessitatibus aperiam ut? Dolor mollitia modi aliquam, non sint at reprehenderit commodi dignissimos quo unde asperiores officiis quos laboriosam similique nihil.</p>
        </div>
      </div>
      <div class="flex flex-col gap-2 border border-white-400">
        <div class="p-5 border border-blue-400" @click="activeIndex=1">
          <h3 class="text-sm text-white-600 cursor-pointer">Is there a free trial with Appsy?</h3>
        </div>
        <div class="p-5" v-show="activeIndex==1">
          <p class="text-sm">Lorem ipsum, consectetur adipisicing elit. Adipisci eligendi, recusandae voluptatum distinctio facilis necessitatibus aperiam ut? Dolor mollitia modi aliquam, non sint at reprehenderit commodi dignissimos quo unde asperiores officiis quos laboriosam similique nihil.</p>
        </div>
      </div>
      <div class="flex flex-col gap-2 border border-white-400">
        <div class="p-5 border border-blue-400" @click="activeIndex=2">
          <h3 class="text-sm text-white-600 cursor-pointer">Is there a free trial with Appsy?</h3>
        </div>
        <div class="p-5" v-show="activeIndex==2">
          <p class="text-sm">Lorem ipsum, consectetur adipisicing elit. Adipisci eligendi, recusandae voluptatum distinctio facilis necessitatibus aperiam ut? Dolor mollitia modi aliquam, non sint at reprehenderit commodi dignissimos quo unde asperiores officiis quos laboriosam similique nihil.</p>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<style scoped>

</style>

<script setup>
  import { ref, onBeforeMount, onMounted, onUpdated, nextTick } from 'vue'
  import Flickity from 'flickity';
  // import Button from './components/Button.vue';
  // import Counter from './components/Counter.vue';
  // import Card from './components/Card.vue'
  import ApplicantDetails from './components/ApplicantDetails.vue'

  const status = ref([])

  const apiResponse = ref(null)

  const message = ref('Hello...')

  const images = ref([
    'https://images.unsplash.com/photo-1707056789925-9daccd5eb108?q=80&w=1843&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'https://images.unsplash.com/photo-1707197066378-36583db5e892?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'https://images.unsplash.com/photo-1707066155653-d187e6f1386f?q=80&w=1636&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'https://plus.unsplash.com/premium_photo-1671478394583-3d91fd9c7ca5?q=80&w=1760&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D',
    'https://images.unsplash.com/photo-1682688759157-57988e10ffa8?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
  ])
  let carousel = null
  const newImage = ref('https://plus.unsplash.com/premium_photo-1671478394525-ec59ab607445?q=80&w=1740&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')
  const addNewImage = () => {
    images.value.push(newImage.value)
    carousel.destroy()
    nextTick(function() {
      carousel = new Flickity('.main-carousel', {})
    })
    newImage.value = ''
  }

  const cardData = [
    {
      image: 'https://flowbite.com/docs/images/products/apple-watch.png',
      price: '500',
      rating: '3',
      title: 'Apple Watch Series 7 GPS, Aluminium Case, Starlight Sport.',
    },
    {
      image: 'https://flowbite.com/docs/images/blog/image-1.jpg',
      price: '10000',
      rating: '2',
      title: 'Noteworthy technology acquisitions 2021',
    },
  ]

  const peoples = [
    {
      name: 'Sabbir Ahammed',
      position: 'Web Develiper',
      email: 'sabbir3@gmail.com',
      salary: '50000',
      about: 'Hi! I am Aabbir Ahammed Sovon.',
      attachments: [
        {
          name: 'cv.pdf',
          size: '25kb',
          type: 'PDF',
          url: '#',
        },
        {
          name: 'cover-later.pdf',
          size: '50kb',
          type: 'PDF',
          url: '#',
        }
      ]
    },
    {
      name: 'Sovon Khan',
      position: 'Web Designer',
      email: 'sovon@gmail.com',
      salary: '25000',
      about: 'Hi! I am Sovon Khan.',
      attachments: [
        {
          name: 'cv.pdf',
          size: '25kb',
          type: 'PDF',
          url: '#',
        },
        {
          name: 'cover-later.pdf',
          size: '50kb',
          type: 'PDF',
          url: '#',
        }
      ]
    },
    {
      name: 'All Shaharier',
      position: 'Graphics Designer',
      email: 'shaharier@gmail.com',
      salary: '40000',
      about: 'Hi! I am All Shaharier.',
      attachments: [
        {
          name: 'cv.pdf',
          size: '25kb',
          url: '#',
        },
        {
          name: 'cover-later.pdf',
          size: '50kb',
          url: '#',
        }
      ]
    },
  ]

  onBeforeMount(() => {
    // console.log('onBeforeMount');
    // status.value.push('onBeforeMount')

    // fetch('https://jsonplaceholder.typicode.com/todos/1')
    //   .then(response => response.json())
    //   .then(json => {
    //     apiResponse.value = json
    //   })
  })
  onMounted(() => {
    // console.log('onMounted');
    // status.value.push('onMounted')

    // carousel = new Flickity('.main-carousel', {})
  })
  onUpdated(() => {
    // console.log('onUpdated');
  })


</script>

<template>
  <div class="container mx-auto">
    <!-- using lifecycle hooks in code -->
    <!-- <div class="mb-5">
      <p>{{ status }}</p>
    </div> -->

    <!-- lifecycle hooks and data from external api -->
    <!-- <div class="mb-5">
      <p>{{ apiResponse }}</p>
    </div> -->

    <!-- onUpdated hook guideline -->
    <!-- <div class="mb-5">
      <p>{{ message }}</p>
      <button type="button" @click="message='Hello Sabbir'">Update</button>
    </div> -->

    <!-- creating a carousel with onMounted -->
    <!-- <div class="container mx-auto">
      <div class="mb-5">
        <input type="text" v-model="newImage" class="p-1 rounded" placeholder="Enter new image link">
        <button type="button" @click="addNewImage()" class="p-1 bg-indigo-400 m-1">Add</button>
      </div>
      <div class="mb-5 main-carousel">
        <div :style="`background-image: url(${image})`" class="item" v-for="(image, index) in images" :key="image"></div>
      </div>
    </div> -->

    <!-- creating a pie chart with chart js and onMounted hook -->
    <!-- <div class="container mx-auto">
      <div class="mb-5">
        <Chart></Chart>
      </div>
    </div> -->

    <!-- Creating our first component -->
    <!-- <div class="container mx-auto">
      <div class="mb-5">
        <Button label="Click Me"></Button>
        <Button color="green" label="Add"></Button>
        <Button color="red" label="Uoload"></Button>
        <Button></Button>
      </div>
    </div> -->

    <!-- Data and methods in a UI Component -->
    <!-- <div class="container mx-auto">
      <div class="mb-5">
        <Counter></Counter>
        <br>
        <br>
        <Counter></Counter>
      </div>
    </div> -->

    <!-- Modifying data inside a component -->
    <!-- <div class="container mx-auto">
      <div class="mb-5">
        <Counter start="10"></Counter>
        <br>
        <br>
        <Counter start="20"></Counter>
      </div>
    </div> -->

    <!-- <Card v-for="item in cardData" :key="item.title" :image="item.image" :price="item.price" :rating="item.rating" :title="item.title"></Card> -->
    <!-- Creating an advanced UI Component -->
    <!-- <div class="container mx-auto">
      <div class="mb-5">
        <Card v-for="item in cardData" :key="item.title" v-bind="item"></Card>
      </div>
    </div> -->

    <!-- Another advanced UI Component -->
    <div class="container mx-auto">
      <div class="mb-5 w-[800px]">
        <ApplicantDetails :applicants="peoples"></ApplicantDetails>
      </div>
    </div>
  </div>
</template>

<style scoped>
.main-carousel{
  width: 500px;
}
.item{
  width: 100%;
  height: 500px;
  background-size: cover;
  background-position: center;
}
</style>

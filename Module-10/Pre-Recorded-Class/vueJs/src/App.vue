<script setup>
  import { ref, reactive, provide } from 'vue'
  // import InputComponent from './components/InputComponent.vue'
  // import PersonComponent from './components/PersonComponent.vue'
  // import NameComponent from './components/NameComponent.vue'
  // import NameComponentX from './components/NameComponentX.vue'
  // import Checkbox from './components/Checkbox.vue'
  // import Radio from './components/Radio.vue'
  // import ComponentA from './components/ComponentA.vue'
  import Button from './components/Button.vue'

  import { course } from './data/course.js'

  const name = ref('Sabbir Ahammed')
  const email = ref('sabbir@gmail.com')

  const person = reactive({
    name: 'Sabbir Ahammed',
    email: 'sabbir@gmail.com',
  })

  const firstName = ref('Sabbir')
  const lastName = ref('Ahammed')

  const taskDone = ref(true)

  const fruit = ref('apple')

  // const course = reactive({
  //   name: 'Vue 3',
  //   price: '$500'
  // })

  // provide('course', course);
</script>

<template>
  <!-- Creating our first component with v-model -->
  <!-- <div class="container mx-auto bg-slate-400 p-5">
    <div class="">
      <label>Name</label><br>
      <input type="text" v-model="name">
    </div>
    <div class="">
      <label>Email</label><br>
      <input type="text" v-model="email">
    </div>

    <div class="mt-3">
      <h1 class="text-xl">Component</h1>
      <InputComponent lable="Name" v-model="name" />
      <InputComponent lable="Email" v-model="email" />
    </div>
  </div> -->

  <!-- Changing reactive object values from a Component -->
  <!-- <div class="container mx-auto bg-slate-400 p-5">
    <div class="">
      <label>Name</label><br>
      <input type="text" v-model="person.name">
    </div>
    <div class="">
      <label>Email</label><br>
      <input type="text" v-model="person.email">
    </div>

    <div class="mt-3">
      <h1 class="text-xl">Component</h1>
      <PersonComponent :person="person" />
    </div>
  </div> -->

  <!-- Multiple v-model to one component -->
  <!-- <div class="container mx-auto bg-slate-400 p-5">
    <div class="">
      <label>firstName</label><br>
      <input type="text" v-model="firstName">
    </div>
    <div class="">
      <label>lastName</label><br>
      <input type="text" v-model="lastName">
    </div>

    <div class="mt-3">
      <h1 class="text-xl">Component</h1>
      <NameComponent v-model:firstName="firstName" v-model:lastName="lastName" />
    </div>
  </div> -->

  <!-- Multiple v-model to one component -->
  <!-- <div class="container mx-auto bg-slate-400 p-5">
    <div class="">
      <p>Name: {{ person.name }}</p><br>
    </div>

    <div class="mt-3">
      <h1 class="text-xl">Component</h1>
      <NameComponentX v-model="person.name" />
    </div>
  </div> -->

  <!-- Checkbox component -->
  <!-- <div class="container mx-auto bg-slate-400 p-5">
    <div class="">
      <p>Task Done Status: {{ taskDone }}</p><br>
    </div>

    <div class="mt-3">
      <h1 class="text-xl">Component</h1>
      <Checkbox v-model="taskDone" label="Task Done Status" />
    </div>
  </div> -->

  <!-- Radio button compoent -->
  <!-- <div class="container mx-auto bg-slate-400 p-5">
    <div class="">
      <p>Fruit: {{ fruit }}</p><br>
    </div>

    <div class="mt-3">
      <h1 class="text-xl">Component</h1>
      <Radio v-model="fruit" label="Apple" value="apple"/>
      <Radio v-model="fruit" label="Banana" value="banana"/>
      <Radio v-model="fruit" label="Orange" value="orange"/>
    </div>
  </div> -->

  <!-- The concept of prop drilling -->
  <!-- <div class="container mx-auto bg-slate-400 p-5">
    <div class="">
      <p>Course: {{ course }}</p><br>
    </div>

    <div class="mt-3">
      <h1 class="text-xl text-amber-600" >Component</h1>
      <ComponentA :course="course"/>
    </div>
  </div> -->

  <!-- Inject and Provide -->
  <!-- <div class="container mx-auto bg-slate-400 p-5">
    <div class="">
      <p>Course: {{ course }}</p><br>
    </div>

    <div class="mt-3">
      <h1 class="text-xl text-amber-600" >Component</h1>
      <ComponentA />
    </div>
  </div> -->

  <!-- Another way of solving Prop drilling problem using global data -->
  <!-- <div class="container mx-auto bg-slate-400 p-5">
    <div class="">
      <p>Course: {{ course }}</p><br>
    </div>

    <div class="mt-3">
      <h1 class="text-xl text-amber-600" >Component</h1>
      <ComponentA />
    </div>
  </div> -->

  <!-- Creating slot -->
  <!-- <div class="container mx-auto bg-slate-400 p-5">
    <div class="mt-3">
      <h1 class="text-xl text-amber-600" >Component</h1>
      <Button>
        Click Me
      </Button>
    </div>
  </div> -->

  <!-- Named Slot -->
  <div class="container mx-auto bg-slate-400 p-5">
    <div class="mt-3">
      <h1 class="text-xl text-amber-600" >Component</h1>
      <Button>
        <template v-slot:ticon>
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--logos" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 198">
            <path fill="#41B883" d="M204.8 0H256L128 220.8L0 0h97.92L128 51.2L157.44 0h47.36Z"></path>
            <path fill="#41B883" d="m0 0l128 220.8L256 0h-51.2L128 132.48L50.56 0H0Z"></path>
            <path fill="#35495E" d="M50.56 0L128 133.12L204.8 0h-47.36L128 51.2L97.92 0H50.56Z"></path>
          </svg>
        </template>
        <!-- Click Me -->
        <template #default>Click Me Again</template>
        <template #bicon>
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--logos" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 198">
            <path fill="#41B883" d="M204.8 0H256L128 220.8L0 0h97.92L128 51.2L157.44 0h47.36Z"></path>
            <path fill="#41B883" d="m0 0l128 220.8L256 0h-51.2L128 132.48L50.56 0H0Z"></path>
            <path fill="#35495E" d="M50.56 0L128 133.12L204.8 0h-47.36L128 51.2L97.92 0H50.56Z"></path>
          </svg>
        </template>
      </Button>
    </div>
  </div>
</template>

<style scoped>

</style>

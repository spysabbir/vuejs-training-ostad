<script setup>
  const todos = [
    {
      id: 1,
      name: 'Attend Class',
      status: 'Completed'
    },
    {
      id: 2,
      name: 'See Video Recording',
      status: 'Processing'
    },
    {
      id: 3,
      name: 'Practice Code',
      status: 'Processing'
    },
    {
      id: 4,
      name: 'Upload Code in Github',
      status: 'Pending'
    }
  ]
</script>

<template>
  <div class="mt-5">
    <h3 class="text-2xl text-red-700">All Todo</h3>
    <ul>
      <li class="bg-indigo-700 p-2 m-1" v-for="todo in todos" :key="todo.id">
        {{ todo.id }}.
        <!-- <span :class="'Completed' == todo.status ? 'line' : ''">{{ todo.name }}</span> -->
        <span :class="{'line' : ('Completed' == todo.status)}">{{ todo.name }}</span>
        <span class="bg-green-900 p-1 m-1">{{ todo.status }}</span>
      </li>
    </ul>
  </div>

  <div class="mt-5">
    <h3 class="text-2xl text-red-700">Processing Todo</h3>
    <ul>
      <template v-for="todo in todos" :key="todo.id">
        <li class="bg-indigo-700 p-2 m-1" v-if="'Processing' == todo.status" >{{ todo.id }}. {{ todo.name }}</li>
      </template>
    </ul>
  </div>

  <div class="mt-5">
    <h3 class="text-2xl text-red-700">Pending Todo</h3>
    <ul>
      <template v-for="todo in todos" :key="todo.id">
        <li class="bg-indigo-700 p-2 m-1" v-if="'Pending' == todo.status">{{ todo.id }}. {{ todo.name }}</li>
      </template>
    </ul>
  </div>

  <div class="mt-5">
    <h3 class="text-2xl text-red-700">Completed Todo</h3>
    <ul>
      <template v-for="todo in todos" :key="todo.id">
        <li class="bg-indigo-700 p-2 m-1" v-if="'Completed' == todo.status">{{ todo.id }}. {{ todo.name }}</li>
      </template>
    </ul>
  </div>
</template>

<style scoped>
  .line{
    text-decoration: line-through;
  }
</style>

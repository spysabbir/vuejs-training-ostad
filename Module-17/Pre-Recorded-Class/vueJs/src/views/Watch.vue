<script setup>
import { ref, onBeforeMount, watch, computed, watchEffect } from 'vue'

// const postId = ref(1)
// const post = ref({})
// const fetchPost = () => {
//     fetch(`https://jsonplaceholder.typicode.com/posts/${postId.value}`)
//         .then(response => response.json())
//         .then(data => post.value = data)
// }
// // onBeforeMount(() => {
// //     fetchPost()
// // })
// watch(postId, () => {
//     fetchPost()
// }, { immediate: true })
// const previosPost = () => {
//     postId.value <= 1 ? postId.value = 1 : postId.value--
//     // fetchPost()
// }
// const nextPost = () => {
//     postId.value++
//     // fetchPost()
// }


// const items = ref([25, 22, 43, 14])
// const total = ref(0)
// // const getTotal = computed( () => {
// //     let total = 0
// //     for (let i = 0; i < items.value.length; i++) {
// //         total += items.value[i]
// //     }
// //     return total
// // })
// watch(items, (newItems, oldItems) => {
//     total.value = newItems.reduce((acc, item) => acc + item, 0)
// }, { deep: true, immediate: true })
// const addRandomItem = () => {
//     items.value.push(Math.floor(Math.random() * 100))
// }


const postId = ref(1)
const post = ref({})
const fetchPost = () => {
    fetch(`https://jsonplaceholder.typicode.com/posts/${postId.value}`)
        .then(response => response.json())
        .then(data => post.value = data)
}
watchEffect(() => {
    fetchPost()
})
const previosPost = () => {
    postId.value <= 1 ? postId.value = 1 : postId.value--
}
const nextPost = () => {
    postId.value++
}

const fName = ref('John')
const lName = ref('Doe')
const fullName = ref('')
watchEffect(() => {
    fullName.value = `${fName.value} ${lName.value}`
})
const updateName = () => {
    fName.value = 'Sabbir'
    lName.value = 'Ahammed'
}

</script>

<template>
    <!-- <div>
        <h1>Introduction to Watch</h1>
        <div>
            <p>Post ID: {{ postId }}</p>
            <p>Post Title: {{ post.title }}</p>
            <p>Post Body: {{ post.body }}</p>
        </div>
        <div class="mt-3">
            <button @click="previosPost" class="px-2 py-1 bg-emerald-400 rounded text-white mx-1">Previos</button>
            <button @click="nextPost" class="px-2 py-1 bg-emerald-400 rounded text-white mx-1">Next</button>
        </div>
    </div> -->

    <!-- <div>
        <h1>Watching arrays</h1>
        <p>
            Value: {{ items }}
        </p>
        <p>
            Total: {{ getTotal }}
            Total: {{ total }}
        </p>
        <div class="mt-1">
            <button @click="addRandomItem()" class="px-2 py-1 bg-blue-700 rounded text-white">Add</button>
        </div>
    </div> -->

    <div>
        <h1>Using watchEffect</h1>
        <div>
            <p>Post ID: {{ postId }}</p>
            <p>Post Title: {{ post.title }}</p>
            <p>Post Body: {{ post.body }}</p>
        </div>
        <div class="mt-3">
            <button @click="previosPost" class="px-2 py-1 bg-emerald-400 rounded text-white mx-1">Previos</button>
            <button @click="nextPost" class="px-2 py-1 bg-emerald-400 rounded text-white mx-1">Next</button>
        </div>
    </div>
    <hr>
    <div>
        <h1>Using watchEffect</h1>
        <div>
            <p>First Name: {{ fName }}</p>
            <p>Last Name: {{ lName }}</p>
            <p>Full Name: {{ fullName }}</p>
        </div>
        <div class="mt-3">
            <input type="text" v-model="fName" class="px-2 py-1 border border-gray-300 rounded">
            <input type="text" v-model="lName" class="px-2 py-1 border border-gray-300 rounded">
        </div>
        <button @click="updateName" class="px-2 py-1 bg-emerald-400 rounded text-white mt-1">Update</button>
    </div>

</template>

<style scoped>

</style>

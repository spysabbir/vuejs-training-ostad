<script setup>
import { ref, computed } from 'vue'
// const n1 = ref('')
// const n2 = ref('')
// const sum = () => {
//     return n1.value + n2.value
// }
// const computedSum = computed(() => {
//     return n1.value + n2.value
// })
// // const computedSum = computed(() => n1.value + n2.value)


// const fName = ref('John')
// const lName = ref('Doe')
// const fullName = computed({
//     get() {
//         return `${fName.value} ${lName.value}`
//     },
//     set(value) {
//         const [newFName, newLName] = value.split(' ')
//         fName.value = newFName
//         lName.value = newLName
//     }
// })

const n1 = ref(5)
const n2 = ref(10)
const sum = () => {
    console.log('sum function');
    return n1.value + n2.value
}
const computedSum = computed(() => {
    console.log('computed sum');
    return n1.value + n2.value
})

</script>

<template>
<div class="bg-slate-500 p-5 rounded">
    <!-- <h1 class="text-2xl mb-3">Introduction to compute</h1>
    <input type="number" v-model="n1" class="p-1 rounded m-1">
    <input type="number" v-model="n2" class="p-1 rounded m-1">
    <p class="mt-3">Sum: {{ sum() }}</p>
    <p class="mt-3">Sum: {{ computedSum }}</p> -->

    <!-- <h1 class="text-2xl mb-3">Getter and setter</h1>
    <input type="text" v-model="fName" class="p-1 rounded m-1">
    <input type="text" v-model="lName" class="p-1 rounded m-1">
    <p class="mt-3">Full Name: {{ fullName }}</p>
    <button @click="fullName = 'Sabbir Ahammed'" class="px-2 py-1 bg-red-400 rounded text-white mt-2">Change</button> -->

    <h1 class="text-2xl mb-3">Function and Computed Property Cache</h1>
   <div class="flex justify-between">
    <div>
        <p class="mt-3">Sum: {{ sum() }}</p>
        <p class="mt-3">Sum: {{ sum() }}</p>
        <p class="mt-3">Sum: {{ sum() }}</p>
        <p class="mt-3">Sum: {{ sum() }}</p>
        <p class="mt-3">Sum: {{ sum() }}</p>
    </div>
    <div>
        <p class="mt-3">Sum: {{ computedSum }}</p>
        <p class="mt-3">Sum: {{ computedSum }}</p>
        <p class="mt-3">Sum: {{ computedSum }}</p>
        <p class="mt-3">Sum: {{ computedSum }}</p>
        <p class="mt-3">Sum: {{ computedSum }}</p>
    </div>
   </div>
   <button @click="n1=10; n2=15" class="px-2 py-1 bg-red-400 rounded text-white mt-2">Change</button>

</div>
</template>

<style scoped>

</style>

<script setup>
    import { ref } from 'vue';

    // const name = ref('VueJs 3')
    // function updateValue(event) {
    //     name.value = event.target.value
    // }
    // function search() {
    //     alert(name.value)
    // }

    const color = ref('color')
</script>

<template>
    <!-- Two wat data binding -->
    <!-- <p>{{ name }}</p>
    <input type="text" :value="name" @input="updateValue($event)">
    <input type="text" v-model="name" >
    <button type="button" @click="search()">Search</button> -->

    <div>
        {{ color }}
    </div>
    <input type="checkbox" v-model="color" true-value="red"> Red
</template>

<style>

</style>
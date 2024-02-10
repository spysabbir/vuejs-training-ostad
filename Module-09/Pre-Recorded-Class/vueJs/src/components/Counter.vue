<script setup>
    import { ref } from 'vue'
    // const count = ref(0)

    const props = defineProps({
        start: {
            type: String,
            default: 0
        }
    })
    const count = ref(props.start)

    const increase = () => {
        count.value++
    }
    const decrease = () => {
        count.value--
    }
</script>

<template>
    <button type="button" @click="decrease()" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">-</button>
    <span class="mx-5 text-2xl">{{ count }}</span>
    <button type="button" @click="increase()" class="bg-blue-400 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">+</button>
</template>
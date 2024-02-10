<script setup>
    // const props = defineProps(['label', 'color'])
    const props = defineProps({
        label: {
            type: String,
            default: 'Click'
        },
        color: {
            type: String,
            default: 'blue'
        }
    })

    const getColor = () => `bg-${props.color}-400 hover:bg-${props.color}-700`
</script>

<template>
    <button type="button" :class="getColor()" class="text-white font-bold py-2 px-4 rounded">{{ label }}</button>
</template>
<script setup>
const props = defineProps(['name']);
const emit = defineEmits(['update:name'])


const reverseText = () => {
  emit('update:name', props.name.split('').reverse().join(''))
}
</script>

<template>
  <div class="mx-auto w-80 bg-slate-800 p-5">
    
    <button type="button" @click="reverseText()" class="py-2 px-3 bg-amber-500 rounded hover:bg-amber-700">Reverse Name</button>
  </div>
</template>

<style scoped>

</style>

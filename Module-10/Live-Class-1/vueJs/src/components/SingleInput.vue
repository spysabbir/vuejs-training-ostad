<script setup>
defineProps(['label', 'modelValue']);
const emit = defineEmits(['update:modelValue'])
const changeInput = (val) => {
  emit('update:modelValue', val)
}
</script>

<template>
  <div class="mx-auto w-80 bg-slate-800 p-5 m-1">
    <h1 class="mb-3 text-2xl">Single Input Component</h1>
    <div class="mb-3">
      <label>{{ label }}</label>
      <!-- <input class="px-1 ml-2" type="text" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)"> -->
      <input class="px-1 ml-2" type="text" :value="modelValue" @input="changeInput($event.target.value)">
    </div>
  </div>
</template>

<style scoped>

</style>

<script setup>
const props = defineProps(['lable', 'modelValue'])
const emit = defineEmits(['update:modelValue'])

</script>

<template>
  <div class="p-3">
    <label>{{ lable }}</label><br>
    <input type="text" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)">
  </div>
</template>

<style scoped>

</style>

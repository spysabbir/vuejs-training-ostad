<script setup>
    const props = defineProps(['label', 'modelValue'])
    const emit = defineEmits(['update:modelValue'])
</script>

<template>
  <div class="p-3">
    <div class="p-3">
      <label class="mx-2">{{ label }}</label>
      <!-- <input type="checkbox" :checked="modelValue" @change="$emit('update:modelValue', !modelValue)"> -->
      <input type="checkbox" :checked="modelValue" @change="$emit('update:modelValue', $event.target.checked)">
    </div>
  </div>
</template>

<style scoped>

</style>

<script setup>
    import { computed } from 'vue'
    const props = defineProps(['label', 'modelValue', 'value'])
    const emit = defineEmits(['update:modelValue'])

    const radioValue = computed({
        get: () => props.modelValue,
        set: (value) => emit('update:modelValue', value),
    })
</script>

<template>
  <div class="p-3">
    <div class="p-3">
      <label class="mx-2">{{ label }}</label>
      <input type="radio" :value="value" v-model="radioValue">
    </div>
  </div>
</template>

<style scoped>

</style>

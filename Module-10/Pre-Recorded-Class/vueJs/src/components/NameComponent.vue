<script setup>
  const props = defineProps(['firstName', 'lastName'])
  const emit = defineEmits(['update:firstName', 'update:lastName'])

</script>

<template>
  <div class="p-3">
    <div class="p-3">
      <label>firstName</label><br>
      <input type="text" :value="firstName" @input="$emit('update:firstName', $event.target.value)">
    </div>
    <div class="p-3">
      <label>lastName</label><br>
      <input type="text" :value="lastName" @input="$emit('update:lastName', $event.target.value)">
    </div>
  </div>
</template>

<style scoped>

</style>

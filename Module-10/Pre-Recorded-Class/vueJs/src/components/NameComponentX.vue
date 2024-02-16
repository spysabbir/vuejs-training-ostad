<script setup>
import { ref } from 'vue'
  const props = defineProps(['modelValue'])
  const emit = defineEmits(['update:modelValue'])

  const nameParts = props.modelValue.split(' ')
  const firstName = ref(nameParts[0])
  const lastName = ref(nameParts[1])

  const updateName = () => {
    emit('update:modelValue', `${firstName.value} ${lastName.value}`)
  }

</script>

<template>
  <div class="p-3">
    <div class="p-3">
      <label>firstName</label><br>
      <input type="text" v-model="firstName" @input="updateName()">
    </div>
    <div class="p-3">
      <label>lastName</label><br>
      <input type="text" v-model="lastName" @input="updateName()">
    </div>
  </div>
</template>

<style scoped>

</style>

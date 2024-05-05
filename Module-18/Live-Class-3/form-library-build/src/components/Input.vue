<script setup>
import { ref } from 'vue'
defineProps({
    type: String,
    placeholder: String,
    modelValue: String,
    label: String
})
</script>

<template>
    <div class="form-group">
        <label>{{ label }} : </label>
        <input :type="type" :placeholder="placeholder" />
    </div>
</template>

<style scoped>
.form-group {
  margin-bottom: 15px;
}
label {
  margin-right: 5px;
}
input {
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
</style>
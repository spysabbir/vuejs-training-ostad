<script setup>
</script>

<template>
  <div class="p-3">
    <div class="p-3">
      <button type="button" class="px-3 py-2 bg-indigo-700 rounded text-white">
        <slot name="ticon"></slot>
        <slot></slot>
        <slot name="bicon"></slot>
      </button>
    </div>
  </div>
</template>

<style scoped>

</style>

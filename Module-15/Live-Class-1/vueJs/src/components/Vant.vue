<script setup>
    import { ref } from 'vue';
    import { Popup } from 'vant';
    const show = ref(false);
    const showPopup = () => {
      show.value = true;
    };
</script>

<template>
  <van-cell title="Show Popup" is-link @click="showPopup"/>
  <van-popup v-model:show="show" closeable round close-icon="close" position="top" :style="{ height: '30%' }"/>
</template>
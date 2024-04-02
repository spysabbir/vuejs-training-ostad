<script  setup>
import { ref } from 'vue';
const activeKey = ref('1');

</script>

<template>
    <!-- <a-qrcode
      error-level="H"
      value="https://www.antdv.com"
      icon="https://www.antdv.com/assets/logo.1ef800a8.svg"
    /> -->

    <div>
        <a-tabs v-model:activeKey="activeKey">
            <a-tab-pane key="1">
            <template #tab>
                <span>
                <apple-outlined />
                Tab 1
                </span>
            </template>
            Tab 1
            </a-tab-pane>
            <a-tab-pane key="2">
            <template #tab>
                <span>
                <android-outlined />
                Tab 2
                </span>
            </template>
            Tab 2
            </a-tab-pane>
        </a-tabs>
    </div>
</template>
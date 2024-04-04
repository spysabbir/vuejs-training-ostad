<template>
  <div class="container-fluid">
    <div class="row">
      <div class="col-3 p-2">
        <circle-progress :percent="30" :show-percent="true"/>
      </div>

      <div class="col-3 p-2">
        <circle-progress :is-gradient="true" :percent="70" :show-percent="true" />
      </div>

      <div class="col-3 p-2">
        <circle-progress
          linecap="stright"
          :show-percent="true"
          :is-gradient="true"
          :gradient="{ angle: 90, startColor: '#145d15', stopColor: '#37a44b' }"
        />
      </div>
    </div>
  </div>
</template>

<script setup>
import "vue3-circle-progress/dist/circle-progress.css";
import CircleProgress from "vue3-circle-progress";
</script>

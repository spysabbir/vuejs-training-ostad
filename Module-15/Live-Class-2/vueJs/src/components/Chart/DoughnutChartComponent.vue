<template>
  <Doughnut :data="data" :options="options" />
</template>

<script setup>
import { Chart, ArcElement, Tooltip, Legend } from "chart.js";
import { Doughnut } from "vue-chartjs";

Chart.register(ArcElement, Tooltip, Legend);
const data = {
  labels: ["AngularJs", "EmberJs", "ReactJs", "VueJs"],
  datasets: [
    {
      backgroundColor: ["#E46651", "#00D8FF", "#DD1B16", "#41B883"],
      data: [10, 20, 30, 80],
    },
  ],
};

const options = {
  responsive: true,
  maintainAspectRatio: false,
  height: 300,
};
</script>

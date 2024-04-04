<template>
  <Line :data="data" :options="options" />
</template>

<script setup>
import {
  Chart,
  Title,
  Tooltip,
  Legend,
  LineElement,
  PointElement,
  CategoryScale,
  LinearScale,
} from "chart.js";
import { Line } from "vue-chartjs";
Chart.register(
  CategoryScale,
  LinearScale,
  LineElement,
  PointElement,
  Title,
  Tooltip,
  Legend
);
const data = {
  labels: ["January", "February", "March", "April", "May", "June", "July"],
  datasets: [
    {
      label: "Line Chart",
      backgroundColor: "#41b883",
      data: [40, 20, 30, 39, 10, 35, 23],
    },
  ],
};

const options = {
  responsive: true,
  height: 300,
  maintainAspectRatio: true,
};
</script>

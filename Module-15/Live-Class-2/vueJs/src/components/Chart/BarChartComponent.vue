<template>
  <Bar :data="data" :options="options" />
</template>

<script setup>
import {
  Chart,
  Title,
  Tooltip,
  Legend,
  BarElement,
  CategoryScale,
  LinearScale,
} from "chart.js";
import { Bar } from "vue-chartjs";

Chart.register(CategoryScale, LinearScale, BarElement, Title, Tooltip, Legend);

const data = {
  labels: ["January", "February", "March", "April", "May", "June", "July"],
  datasets: [
    {
      label: "My Bar Chart",
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

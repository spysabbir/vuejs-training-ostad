<script setup>
  import { ref, onMounted, onUnmounted } from 'vue';

  const newItem = ref(25);
  let chart = null;
  const dataset = [300, 50, 100];
  const data = {
    labels: ['Red', 'Blue', 'Yellow'],
    datasets: [{
      label: 'My First Dataset',
      data: dataset,
      backgroundColor: ['rgb(255, 99, 132)', 'rgb(54, 162, 235)', 'rgb(255, 205, 86)', 'rgb(43, 105, 86)', 'rgb(21, 21, 186)'],
      hoverOffset: 4
    }]
  };
  const config = {
    type: 'pie',
    data: data,
  };

  onMounted(() => {
    const ctx = document.getElementById('chart');
    chart = new Chart(ctx, config);
  });

  const updateChart = () => {
    dataset.push(newItem.value);
    chart.data.datasets[0].data = dataset;
    chart.update();
  };
</script>

<template>
  <div class="mb-3">
    <input type="number" v-model="newItem">
    <button type="button" @click="updateChart()">Add</button>
  </div>
  <div class="w-[400px] h-[400px] mx-auto bg-gray-700">
    <canvas id="chart"></canvas>
  </div>
</template>

<style scoped>
/* Add any scoped styles if needed */
</style>

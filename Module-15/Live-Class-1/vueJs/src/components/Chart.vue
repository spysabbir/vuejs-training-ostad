<template>
    <Chart
      :size="{ width: 500, height: 420 }"
      :data="data"
      :margin="margin"
      :direction="direction"
      :axis="axis">
  
      <template #layers>
        <Grid strokeDasharray="2,2" />
        <Area :dataKeys="['name', 'pl']" type="monotone" :areaStyle="{ fill: 'url(#grad)' }" />
        <Line
          :dataKeys="['name', 'pl']"
          type="monotone"
          :lineStyle="{
            stroke: '#9f7aea'
          }"
        />
        <Marker v-if="marker" :value="1000" label="Mean." color="green" strokeWidth="2" strokeDasharray="6 6" />
        <defs>
          <linearGradient id="grad" gradientTransform="rotate(90)">
            <stop offset="0%" stop-color="#be90ff" stop-opacity="1" />
            <stop offset="100%" stop-color="white" stop-opacity="0.4" />
          </linearGradient>
        </defs>
      </template>
  
      <template #widgets>
        <Tooltip
          borderColor="#48CAE4"
          :config="{
            pl: { color: '#9f7aea' },
            avg: { hide: true },
            inc: { hide: true }
          }"
        />
      </template>
  
    </Chart>
  </template>
  
  <script lang="ts">
  import { defineComponent, ref } from 'vue'
  import { Chart, Grid, Line } from 'vue3-charts'
  
  const plByMonth = [
  { name: 'Jan', pl: 1000, avg: 500, inc: 300 },
  { name: 'Feb', pl: 2000, avg: 900, inc: 400 },
  { name: 'Apr', pl: 400, avg: 400, inc: 500 },
  { name: 'Mar', pl: 3100, avg: 1300, inc: 700 },
  { name: 'May', pl: 200, avg: 100, inc: 200 },
  { name: 'Jun', pl: 600, avg: 400, inc: 300 },
  { name: 'Jul', pl: 500, avg: 90, inc: 100 }
]
  
  export default defineComponent({
    name: 'LineChart',
    components: { Chart, Grid, Line },
    setup() {
      const data = ref(plByMonth)
      const direction = ref('horizontal')
      const margin = ref({
        left: 0,
        top: 20,
        right: 20,
        bottom: 0
      })
  
      const axis = ref({
        primary: {
          type: 'band'
        },
        secondary: {
          domain: ['dataMin', 'dataMax + 100'],
          type: 'linear',
          ticks: 8
        }
      })
  
      return { data, direction, margin, axis }
    }
  })
  </script>
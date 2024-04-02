<!-- <script setup>
import { ref } from 'vue';

const selectedColor = ref('blue');
const attrs = ref([
  {
    key: 'test',
    highlight: true,
    dates: { start: new Date(2019, 3, 15), end: new Date(2019, 3, 19) },
  }
]);
</script>

<template>
    <VCalendar
      :initial-page="{ month: 4, year: 2019 }"
      :color="selectedColor"
      :attributes="attrs"
    />
</template> -->
 
<script setup>
import { ref } from 'vue';

const date = ref(new Date());
</script>

<template>
  <VDatePicker v-model="date" />
</template>



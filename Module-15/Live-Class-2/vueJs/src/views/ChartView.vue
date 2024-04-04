<script setup>
import Layout from "../components/Layout.vue";
import BarChartComponent from "../components/Chart/BarChartComponent.vue";
import LineChartComponent from "../components/Chart/LineChartComponent.vue";
import DoughnutChartComponent from "../components/Chart/DoughnutChartComponent.vue";
import PieChartComponent from "../components/Chart/PieChartComponent.vue";
</script>

<template>
  <Layout>
    <div class="container-fluid">
      <div class="row">
        <div class="col-6 p-2">
          <div class="card shadow-sm">
            <div class="card-body">
              <BarChartComponent />
            </div>
          </div>
        </div>
        <div class="col-6 p-2">
          <div class="card shadow-sm">
            <div class="card-body">
              <LineChartComponent />
            </div>
          </div>
        </div>
        <div class="col-6 p-2">
          <div class="card shadow-sm">
            <div class="card-body">
              <DoughnutChartComponent />
            </div>
          </div>
        </div>
        <div class="col-6 p-2">
          <div class="card shadow-sm">
            <div class="card-body">
              <PieChartComponent />
            </div>
          </div>
        </div>
      </div>
    </div>
  </Layout>
</template>

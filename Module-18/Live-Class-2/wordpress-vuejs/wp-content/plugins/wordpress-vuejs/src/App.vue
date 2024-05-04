<script setup>
import data from "./data.js";
// const pluginData = wordpress_vuejs;
fetch(wordpress_vuejs.ajax_url + '?action=vuejs_data&nonce=' + wordpress_vuejs.nonce)
  .then(res => res.json())
  .then(res => {
    data.welcome = res.welcome
    data.settings = res.settings
  })
  .catch(err => console.log(err));

// jQuery.ajax({
//   url: wordpress_vuejs.ajax_url,
//   type: 'get',
//   data: {
//     action: 'vuejs_data',
//     nonce: wordpress_vuejs.nonce,
//   },
//   dataType: 'json',
//   success(res) {
//     data.welcome = res.welcome
//     data.settings = res.settings
//   },
//   error(req, status, error) {
//     console.log([ req, status, error ]);
//   }
// });

</script>

<template>
  <img :src="pluginData.plugin_url + 'public/vite.svg'" alt="">
  <router-link to="/">Welcome</router-link>
  <router-link to="/settings">Settings</router-link>
  <router-view></router-view>
</template>

<style scoped>
a {
  margin-right: 10px;
}
</style>
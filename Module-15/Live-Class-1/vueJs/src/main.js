import { createApp } from 'vue'
import './style.css'
import App from './App.vue'

// Vuetify
import 'vuetify/styles'
import { createVuetify } from 'vuetify'
import * as components from 'vuetify/components'
import * as directives from 'vuetify/directives'

const vuetify = createVuetify({
  components,
  directives,
})

// ElementPlus
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'

// PrimeVue
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/aura-light-green/theme.css'

// Vant
import Vant from 'vant';
import 'vant/lib/index.css';

// Vuestic
import { createVuestic } from "vuestic-ui";
import "vuestic-ui/css";

// Antdv
import Antd from 'ant-design-vue';
import 'ant-design-vue/dist/reset.css';

// VCalendar
import VCalendar from 'v-calendar';
import 'v-calendar/style.css'

// BootstrapVue
import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

// Vue Material
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'
Vue.use(VueMaterial)

createApp(App)
  .use(vuetify)
  .use(ElementPlus)
  .use(PrimeVue)
  .use(Vant)
  .use(createVuestic())
  .use(Antd)
  .use(VCalendar, {})
  .mount('#app')

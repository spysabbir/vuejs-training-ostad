import { createApp } from 'vue'
import './style.css'
import App from './App.vue'
import router from './router'
import menuFix from './menu-fix'

const app = createApp(App);

app.config.globalProperties.pluginData = wordpress_vuejs;

app.use(router).mount('#wordpress-vuejs-dashboard-app')
menuFix('wordpress-vuejs');
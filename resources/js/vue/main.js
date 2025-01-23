import { createApp } from "vue";

import { Oruga } from "@oruga-ui/oruga-next";
import VueCookies from 'vue3-cookies'
import '../../css/vue.css'

import '@oruga-ui/theme-oruga/dist/oruga.css';
import '@mdi/font/css/materialdesignicons.min.css';

import App from "./App.vue";

import axios from "axios";

import router from "./router";

const app = createApp(App)
app.use(Oruga).use(router).use(VueCookies)

app.config.globalProperties.$axios = axios
window.axios = axios

app.mount("#app")

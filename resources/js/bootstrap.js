

import axios from 'axios';
import {createApp} from 'vue'
import App from './vue/App.vue'
import router from './vue/router';
import store from './vue/store';

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';

createApp(App)
.use(store)
.use(router)
.mount("#app")


window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

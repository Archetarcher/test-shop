import './bootstrap.js';
import '../sass/app.scss'

import { createApp } from 'vue/dist/vue.esm-bundler.js';
import router from '@/router';
import store from '@/store';




const app = createApp({});


app.use(router);
app.use(store);
app.mount('#app');

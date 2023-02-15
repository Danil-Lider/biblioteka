import { createApp } from "vue/dist/vue.esm-bundler.js";

import alpine from "alpinejs";

import './bootstrap';

import '../sass/app.scss'

// import * as bootstrap from 'bootstrap'


window.alpine = alpine;
alpine.start();


import CatalogIndexComponent from './components/CatalogIndexComponent.vue';



// createApp(App).use(store).mount('#app')

const app = {
    components: {
        CatalogIndexComponent,
        // Calendar
    }
};


createApp(app).mount('#app')


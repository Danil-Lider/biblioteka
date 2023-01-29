
import './bootstrap';

import Vue from 'Vue';

// import './app.scss'
import alpine from "alpinejs";






window.alpine = alpine;
alpine.start();

console.log(alpine.version);


import CatalogIndexComponent from './components/CatalogIndexComponent.vue';
// import BCalendar from BootstrapVue;

const app = Vue({
    components: {
        CatalogIndexComponent,
        // BCalendar
    }
});

app.mount('#app');

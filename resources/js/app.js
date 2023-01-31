import { createApp } from "vue/dist/vue.esm-bundler.js";

import alpine from "alpinejs";


// import { Calendar } from "vue-calendar-3";
// If you using vite
// import "vue-calendar-3/style";


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

// app.mount('#app');

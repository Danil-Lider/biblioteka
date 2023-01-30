import { createApp } from "vue/dist/vue.esm-bundler.js";

import alpine from "alpinejs";


window.alpine = alpine;
alpine.start();


import CatalogIndexComponent from './components/CatalogIndexComponent.vue';



// createApp(App).use(store).mount('#app')

const app = {
    components: {
        CatalogIndexComponent
    }
};


createApp(app).mount('#app')

// app.mount('#app');

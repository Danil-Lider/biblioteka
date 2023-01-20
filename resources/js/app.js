
import './bootstrap';
import { createApp } from 'vue';


 import CatalogIndexComponent from './components/CatalogIndexComponent.vue';

const app = createApp({
    components: {
        CatalogIndexComponent
    }
});

app.mount('#app');

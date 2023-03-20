<template>
    <div class="container">

        <div>
            <Erorr v-bind:data="error"></Erorr>
        </div>

        <div>
            <!-- v-bind:item="item" -->
            <OrderItem ref="OrderItemChildComponent"></OrderItem>
        </div>

        <div>
            <ItemsComponent @orderItem='showModalBeforeOrder' ref="ItemsChildComponent" v-bind:data="data"></ItemsComponent>  
        </div>

        <div v-if="data.links"> 
            <NavigationComponent v-bind:links="data.links"></NavigationComponent>
        </div>

    </div>
    
</template>

<script>

    import axios from 'axios';
    import Erorr from './ErrorComponent.vue';
    import ItemsComponent from './ItemsComponent.vue';
    import OrderItem from './OrderItemComponent.vue';
    import NavigationComponent from './NavigationComponent.vue';

    


    export default {
        components: { ItemsComponent,NavigationComponent , Erorr , OrderItem},
        data() {
            return {
                error: null,
                item: null,
            }
        },
        props: ['data'],
        mounted() {
        },
        methods: {
            // 1. START WHEN CLICK ON ORDER 
            showModalBeforeOrder: function(item){
                this.showModalFromCatalog(item);
            },
            // 2. SHOW MODAL WITH DATEPICKER ON CHILD
            showModalFromCatalog: function (item){
                this.$refs.OrderItemChildComponent.showModal(item);
            }
        },
    }
</script>















<style>

.pagination {
    margin-top: 2rem;
    /* display: block; */
}
</style>
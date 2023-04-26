<template>

    
    <div class="container">

        <h1 style="margin-top: 1rem;">Мои бронирования</h1>

        <div>
            <Erorr v-bind:data="error"></Erorr>
        </div>

        <div v-if="data">

            <div class="card-deck">
                <div v-for="item in data.data" class="card">
                    <img :src="item.image" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ item.name }}</h5>
                    </div>
                    <div class="card-footer">   
                        <p class="text-muted">Бронь на: {{ item.date_main }} {{ item.hour }}:00</p>
                        
                        <div v-on:click="deleteItem(item)" href="#" class="btn btn-primary">Удалить бронь</div>
                    </div>
                </div>
            </div>  

        </div>

       <a href="/">На главную </a>


        <div style="display: none;" v-if="data.links"> 
            <NavigationComponent v-bind:links="data.links"></NavigationComponent>
        </div>

    </div>
    
</template>

<script>

    import axios from 'axios';
    import Erorr from './ErrorComponent.vue';
    import NavigationComponent from './NavigationComponent.vue';

    


    export default {
        components: { NavigationComponent , Erorr },
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
            deleteItem: function(item){

                console.log(item)
                

                axios.get('http://localhost:8080/item_destroy?id=' + item.id ).then(response => {

                    console.log(response)

                }).catch(error => {

                });

            }
        },
    }
</script>















<style scoped>
.card-deck {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    /* margin-top: 5rem; */
}
.card {
    width: 300px;
    margin-top: 2rem;
}

.pagination {
    margin-top: 2rem;
    /* display: block; */
}

</style>
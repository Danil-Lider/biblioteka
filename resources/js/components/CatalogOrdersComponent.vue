<template>
    <div class="container">

        <div>
            <Erorr v-bind:data="error"></Erorr>
        </div>

        <div v-if="data">

            <div class="card-deck">
                <div v-for="item in data.data" class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvGw-65vEUR3k8s60dEUFY_lHgAKxXMd-3uA&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ item.name }}</h5>
                        <p class="card-text">1 Автор: {{ item.author }}</p>
                        <p class="card-text">Жанр: {{ item.genre }}</p>
                        <p class="card-text">Издатель: {{ item.publisher }}</p>
                    </div>
                    <div class="card-footer">   
                        <p class="text-muted">Бронь с: {{ item.start_to_book }}</p>
                        <p class="text-muted">Бронь до: {{ item.end_to_book }} </p>
                        <div v-on:click="deleteItem(item)" href="#" class="btn btn-primary">Удалить бронь</div>
                    </div>
                </div>
            </div>  

        </div>


        <div v-if="data.links"> 
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
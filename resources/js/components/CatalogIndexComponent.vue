<template>
    <div class="container">

        <div>
            <Erorr v-bind:error_show="error_show" v-bind:data="error"></Erorr>
        </div>

       


        <Datepicker  @update:modelValue="handleDate" locale="ru" :min-date="new Date()" range v-model="MainDate"></Datepicker>
        
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
                    <small class="text-muted">Last updated 3 mins ago</small>
                    <div v-on:click="orderItem(item)" href="#" class="btn btn-primary">1 Забронировать</div>
                </div>
            </div>
        </div>

        <nav aria-label="Page navigation example">
            <ul  v-if="data.links"  class="pagination">

                <div  v-for="link in data.links" >

                    <div v-if="link.active">
                        <li class="page-item active">
                            <a class="page-link" :href="link.url">{{ link.label }}</a>
                        </li>
                    </div>

                    <div v-else>
                        <li class="page-item">
                            <a class="page-link" :href="link.url">{{ link.label }}</a>
                        </li>
                    </div>
                    
                </div>
            
            </ul>
        </nav>

    </div>
    
</template>

<script>
    import axios from 'axios';
    import Datepicker from '@vuepic/vue-datepicker';
    import '@vuepic/vue-datepicker/dist/main.css'

    import Erorr from './ErrorComponent.vue';


    export default {
        components: { Datepicker, Erorr },
        data() {
            return {
                MainDate: null,
                error: 'test',
                error_show: 0,
            }
        },
        props: ['data'],
        mounted() {
        },
        methods: {
            orderItem : function(item){

                axios.post('http://localhost:8080/books', {

                    data: item

                }).then(response => {

                    console.log(response);

                }).catch(error => {

                    // this.callMethodInParentComponent();

                    this.error = error;

                    this.error_show = 1;
                    console.log('Ошибка есть ')
                    console.log(error);

                });

            },
            handleDate:  (modelData) => {
            }
            
        },
    }
</script>

<style>
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
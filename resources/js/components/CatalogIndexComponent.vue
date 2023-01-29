<template>
    <div class="container">


        <b-calendar v-model="value" :min="min" :max="max" locale="ru"></b-calendar>

        <div class="card-deck">
            <div v-for="item in data.data" class="card">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTvGw-65vEUR3k8s60dEUFY_lHgAKxXMd-3uA&usqp=CAU" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ item.name }}</h5>
                    <p class="card-text">Автор: {{ item.author }}</p>
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
    // import *  from 'bootstrap-vue';
    export default {
        props: ['data'],
        mounted() {
            // console.log(this.data)
        },
        methods: {
            orderItem : function(item){
                console.log(item)
            }
        }
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
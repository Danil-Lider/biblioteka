<template>
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
                <div v-on:click="orderItem(item)" href="#" class="btn btn-primary">Забронировать</div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['data'],
    methods: {
        orderItem: function(item){

            this.$emit('orderItem', item)

            // console.log(item)
        }
    }
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
</style>
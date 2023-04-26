<template>
    <div class="card-deck">
        <div v-for="item in data.data" class="card">
            <img :src="item.image" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Адрес: {{ item.name }}</h5>
            </div>
            <div class="card-footer">   
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
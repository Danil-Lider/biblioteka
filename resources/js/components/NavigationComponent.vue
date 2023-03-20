<template>

    <nav aria-label="Page navigation example">
        <ul  v-if="links"  class="pagination">

            <div  v-for="link in links" >

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

</template>
<script>
export default {
    props: ['links'],
}
</script>
<style scoped>
    
</style>
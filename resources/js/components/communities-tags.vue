<template>
    <div class="contact">
        <h3 class="page-title my-4">Communities Tags</h3>
       <div v-if="item.overview">
           <div class="badge text-white bg-primary mr-2 mt-2" v-for="(comm, index) in item.overview.communities" :key="index">
               {{ comm.value }}
           </div>
       </div>
    </div>
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            default: () => ({}),
        }
    },
}
</script>
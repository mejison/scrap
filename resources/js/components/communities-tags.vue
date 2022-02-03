<template>
    <div class="contact">
        <h3 class="page-title my-4">Communities Tags</h3>
       <div>
           <div class="badge text-white bg-primary mr-2 mt-2" v-for="(comm, index) in communities" :key="index">
               {{ comm }}
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

    computed: {
        communities() {
            const item = this.item

            return item ? this.item.Community.split(',') : [];
        }
    }
}
</script>
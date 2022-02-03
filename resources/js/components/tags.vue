<template>
    <div class="contact">
        <h3 class="page-title my-4">Tags</h3>
       <div>
           <div class="badge text-white bg-primary mr-2 mt-2" v-for="(tag, index) in tags" :key="index">
               {{ tag }}
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
        tags() {
            const item = this.item
            return item ? this.item.Tags.split(',') : [];
        }
    }
}
</script>
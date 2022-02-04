<template>
    <div class="contact">
        <h3 class="page-title my-4">Tags</h3>
       <div v-if="item.overview">
           <div class="badge text-white bg-primary mr-2 mt-2" v-for="(tag, index) in item.overview.tag_list" :key="index">
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

}
</script>
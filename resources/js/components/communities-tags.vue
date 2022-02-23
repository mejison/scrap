<template>
    <div class="contact">
        <h3 class="page-title my-4">Communities Tags</h3>
       <div v-if="item.overview">
           <div class="badge text-white bg-primary mr-2 mt-2" v-for="(comm, index) in unique(item.overview.communities)" :key="index">
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

    methods: {
        unique(items) {
            let unique = [];
            items.forEach(element => {
                if ( ! unique.includes(element.value)) {
                    unique.push(element.value)
                }
            });
            return unique;
        },
    }
}
</script>
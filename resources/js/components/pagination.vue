<template>
   <pagi 
        v-model="page" 
        :records="total"
        :per-page="perPage"
        ref="pagination"
    />
</template>

<script>
import Pagination from 'vue-pagination-2';

import { mapState } from 'vuex';
export default {
    name: 'pagination',

    components: {
        'pagi': Pagination,
    },

    props: {
        current: {
            type: Number,
            default: 1,
        },
        perPage: {
            type: Number,
            default: 10,
        },
        total: {
            type: Number,
            default: 0,
        },
    },

    watch: {
        page() {
            this.$emit('page', this.page)
        }
    },

    data() {
        return {
            page: 1,
        }
    },

    methods: {
        onClickNext() {
            this.$emit('next');
        },
        onClickPrev() {
            this.$emit('prev');
        },
    },

    computed: {
        ...mapState("unity", ['items']),
        pages() {
            const pages = Math.round(this.total / this.perPage);
            return [...(new Array(pages))]
        },
        canPrev() {
            return this.current != 1
        },
        canNext() {
            return this.items.length == this.perPage;
        },
    },
}
</script>
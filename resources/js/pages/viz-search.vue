<template>
    <div>
         <div class="form-head d-flex mb-0 mb-lg-4 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <h2 class="text-black font-w600">Viz Search</h2>
                <p class="mb-0">Current viz list</p>
            </div>
        </div>	
        <div class="row">
            <filter-viz-search @change="onChangeFilter" />
            <div class="col-12">
                <viz-search-results
                    :items="items"
                    @open="onOpen"
                    />
                 <pagination 
                    :current="filter.page"
                    :total="filter.total"
                    :per-page="filter.per_page"
                    @page="onClickPage"
                />
            </div>
            <details-view-post :item="item" @close="setItem(null)" />
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex';
import FilterVizSearch from '../components/filters/viz-search.vue'
import Pagination from '../components/pagination.vue';
import VizSearchResults from '../components/viz-search-results.vue';
import requestMixin from '../mixins/requestMixin';
import vizMixin from '../mixins/vizMixin';
import detailsViewPost from '../popups/detailsViewPost.vue'

export default {
    name: 'viz-search-filter',

    components: {
        FilterVizSearch,
        VizSearchResults,
        Pagination,
        detailsViewPost
    },

    data() {
        return {
            
        }
    },

    mixins: [
        requestMixin,
        vizMixin,
    ],

    mounted() {
        this.fetchDataViz();
    },

    methods: {
        onOpen(item) {
            this.setItem(item)
        },
    },

    computed: {
        ...mapState("viz", ['items', 'filter', 'item']),
    },

}
</script>
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
            <div class="col-12" id="content">
                <viz-search-results
                    :items="items"
                    @open="onOpen"
                    />
                 <pagination 
                    :current="filterVizSearch.page"
                    :total="filterVizSearch.total"
                    :per-page="filterVizSearch.per_page"
                    @page="onClickPage"
                />
                <loader />
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
import vizMixin from '../mixins/vizMixin';
import detailsViewPost from '../popups/detailsViewPost.vue'
import { mapActions } from 'vuex'
import loader from '../components/loader.vue';

export default {
    name: 'viz-search-filter',

    components: {
        FilterVizSearch,
        VizSearchResults,
        Pagination,
        detailsViewPost,
        loader,
    },

    mixins: [
        vizMixin,
    ],

    mounted() {
        this.fetchDataViz();
    },

    methods: {
        ...mapActions("viz", ['setItem']),
        onOpen(item) {
            this.setItem(item)
        },
    },

    computed: {
        ...mapState("viz", ['items', 'item']),
    },

}
</script>
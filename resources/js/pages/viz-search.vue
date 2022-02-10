<template>
    <div>
         <div class="form-head d-flex mb-0 mb-lg-4 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <h2 class="text-black font-w600">Viz Search</h2>
                <p class="mb-0">Current viz list</p>
            </div>
        </div>	
        <div class="row">
            <filter-viz-search />
            <div class="col-12">
                <viz-search-results />
            </div>
        </div>
    </div>
</template>

<script>
import FilterVizSearch from '../components/filters/viz-search.vue'
import VizSearchResults from '../components/viz-search-results.vue';
import requestMixin from '../mixins/requestMixin';

export default {
    name: 'viz-search-filter',

    components: {
        FilterVizSearch,
        VizSearchResults
    },

    mixins: [
        requestMixin
    ],

    mounted() {
        this.stopLoader();
    }
}
</script>
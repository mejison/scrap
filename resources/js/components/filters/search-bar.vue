<template>
    <div class="search_bar dropdown show">
        <div class="dropdown-menu p-0 m-0 show">
            <input class="form-control search" type="text" @keyup.enter.prevent="onSearch" @input="onInput" v-model="query"  placeholder="Search Here" aria-label="Search">
        </div>
        <span class="clear" v-if="query.length" @click.prevent="onClear">
            &times;
        </span>
        <span  @click.prevent="onSearch" class="search_icon p-3 c-pointer" data-toggle="dropdown">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.7871 22.7761L17.9548 16.9437C19.5193 15.145 20.4665 12.7982 20.4665 10.2333C20.4665 4.58714 15.8741 0 10.2333 0C4.58714 0 0 4.59246 0 10.2333C0 15.8741 4.59246 20.4665 10.2333 20.4665C12.7982 20.4665 15.145 19.5193 16.9437 17.9548L22.7761 23.7871C22.9144 23.9255 23.1007 24 23.2816 24C23.4625 24 23.6488 23.9308 23.7871 23.7871C24.0639 23.5104 24.0639 23.0528 23.7871 22.7761ZM1.43149 10.2333C1.43149 5.38004 5.38004 1.43681 10.2279 1.43681C15.0812 1.43681 19.0244 5.38537 19.0244 10.2333C19.0244 15.0812 15.0812 19.035 10.2279 19.035C5.38004 19.035 1.43149 15.0865 1.43149 10.2333Z" fill="#A4A4A4"/></svg>
        </span>
    </div>
</template>

<script>
import { mapActions, mapState } from 'vuex';
import requestMixin from '../../mixins/requestMixin';
import vizMixin from '../../mixins/vizMixin';

export default {
    mixins: [requestMixin, vizMixin],

    data() {
        return {
            query: "",
        }
    },

    mounted() {
        if (this.filter.search) {
            this.query = this.filter.search
        }
    },

    computed: {
        ...mapState("unity", ["filter"]),
        ...mapState("viz", {
            filterVizSearch: state => state.filter,
        }),
    },

    methods: {
        ...mapActions("unity", ['setFilter']),
        ...mapActions({
            setFilterVizSearch: "viz/setFilter"
        }),
        onClear() {
            this[`${this.$route.name}Clear`]();
        },
        onInput() {
            this[`${this.$route.name}Input`]();
        },
        onSearch() {
            this[`${this.$route.name}Search`]();
        },
        VizSearchSearch() {
            this.setFilterVizSearch({
                ...this.filterVizSearch,
            });
            this.fetchDataViz();
        },
        VizSearchInput() {
            this.setFilterVizSearch({
                ...this.filterVizSearch,
                total: 0,
                page: 1,
                search: this.query
            });
        },
        VizSearchClear() {
            this.setFilterVizSearch({
                ...this.filterVizSearch,
                total: 0,
                page: 1,
                search: ''
            })
            this.query = ''
            this.fetchDataViz();
        },
        UnitySearchSearch() {
            this.setFilter({
                ...this.filter,
            });
            this.fetchData();
        },
        UnitySearchInput() {
            this.setFilter({
                ...this.filter,
                total: 0,
                page: 1,
                search: this.query
            });
        },
        UnitySearchClear() {
            this.setFilter({
                ...this.filter,
                total: 0,
                page: 1,
                search: ''
            })
            this.query = ''
            this.fetchData();
        },
    },
}
</script>

<style lang="scss" scoped>
    .header-left .search_bar .dropdown-menu, 
    .header-left .search_bar .dropdown-menu.show {
    border-top-right-radius: 0;
            border-bottom-right-radius: 0;
    }

    .search_bar {
        position: relative;

        .clear {
            position: absolute;
            top: 50%;
            right: 50px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 23px;
            color: #999;
            z-index: 1001;
        }
    }

</style>
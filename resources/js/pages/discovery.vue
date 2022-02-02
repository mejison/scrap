<template>
    <div class="row">
        <filter-unity-search v-model="filter"></filter-unity-search>
        <div class="col-12">
            <component :items="itemsFiltered" :is="currentView" @selected-community="onSelectedCommunity"></component>
        </div>
    </div>
</template>

<script>
import FilterUnitySearch from '../components/filters/unity-search.vue'
import Communities from './discovery/communities';
import Search from './discovery/search';

export default {
    name: 'discovery',

    components: {
        FilterUnitySearch,
        Communities,
        Search,
    },

    data() {
        return {
            filter: {
                location: null,
                connections: null,
                communities: null,
                age: null,
            },
            items: [],
        }
    },

    created() {
        this.fetchData();
    },

    methods: {
        async fetchData() {
            let data = await fetch("/storage/data/stmlnportal.com.json").then(r => r.json());
            this.items = data;
        },
        onSelectedCommunity(community) {
            this.filter = {
                ...this.filter,
                communities: {
                    label: community.name,
                    value: community.name.toLowerCase()
                },
            }
        },
    },

    computed: {
        itemsFiltered() {
            return this.items.filter(item => {
                return true;
            });
        },
        currentView() {
            return this.filter.communities && this.filter.communities.value ? 'search' : 'communities'
        },
    },
}
</script>
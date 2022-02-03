<template>
    <div>
        <div class="form-head d-flex mb-0 mb-lg-4 align-items-start">
            <div class="mr-auto d-none d-lg-block">
                <h2 class="text-black font-w600">Unity Search</h2>
                <p class="mb-0">Current unity list</p>
            </div>
        </div>	
        <div class="row">
            <filter-unity-search
                v-model="filter" 
                :location-options="locationOptions"
                :connections-options="connectionsOptions"
                :network-options="networkOptions"
                :communities-options="communitiesOptions"
                :age-options="ageOptions"
                @clear="onClearFilter"
                ></filter-unity-search>
            <div class="col-12">
                <component :items="itemsFiltered" :is="currentView" @selected-community="onSelectedCommunity"></component>
            </div>
        </div>
    </div>
</template>

<script>
import FilterUnitySearch from '../components/filters/unity-search.vue'
import Communities from './discovery/communities';
import Search from './discovery/search';
import _ from 'lodash';

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
            locationOptions: [
                {
                    label: 'Any',
                    value: null,
                },
            ],
            connectionsOptions: [
                {
                    label: 'Any',
                    value: null,
                },
                {
                    label: 'Facebook',
                    value: 'facebook'
                },
                {
                    label: 'Instagram',
                    value: 'instagram'
                },
                {
                    label: 'Pinterest',
                    value: 'pinterest'
                },
                {
                    label: 'Blog',
                    value: 'blog'
                },
                {
                    label: 'Twitter',
                    value: 'twitter',
                },
                {
                    label: 'Youtube',
                    value: 'youtube',
                },
                {
                    label: 'Wordpress',
                    value: 'wordpress',
                },
                {
                    label: 'Twitch',
                    value: 'twitch',
                }
            ],
            networkOptions: [
                {
                    label: 'Any',
                    value: null,
                },
                {
                    label: 'One',
                    value: 'one'
                },
                {
                    label: 'Two',
                    value: 'two'
                },
                {
                    label: 'Three',
                    value: 'three'
                },
            ],
            communitiesOptions: [
                {
                    label: 'Any',
                    value: null,
                },
                {
                    label: 'Beauty',
                    value: 'beauty',
                },
                {
                    label: 'DIY / Craft',
                    value: 'diy',
                },
                {
                    label: 'Family',
                    value: 'family',
                },
                {
                    label: 'Celebrity',
                    value: 'celebrity',
                },
                {
                    label: 'Fashion',
                    value: 'fashion',
                },
                {
                    label: 'Food',
                    value: 'food',
                },
                {
                    label: 'Health',
                    value: 'health',
                },
                {
                    label: 'Business',
                    value: 'business',
                },
                {
                    label: 'Entertainment',
                    value: 'entertainment',
                },
                {
                    label: 'Music',
                    value: 'music',
                },
                {
                    label: 'Pop Culture',
                    value: 'pop_culture',
                },
                {
                    label: 'Sports',
                    value: 'sports',
                },
                {
                    label: 'Technology',
                    value: 'technology',
                },
                {
                    label: 'Travel',
                    value: 'travel',
                },
                {
                    label: 'Video Games',
                    value: 'video-games',
                },
            ],
            ageOptions: [
                {
                    label: 'Any',
                    value: null,
                },
                {
                    label: '18',
                    value: 18
                },
                {
                    label: '19',
                    value: 19
                },
                {
                    label: '20',
                    value: 20
                },
                {
                    label: '21',
                    value: 21
                },
                {
                    label: '22',
                    value: 22
                },
                {
                    label: '23',
                    value: 23
                },
                {
                    label: '24',
                    value: 24
                },
                {
                    label: '25',
                    value: 25
                },
                {
                    label: '26',
                    value: 26
                },
                {
                    label: '27',
                    value: 27
                },
                {
                    label: '28',
                    value: 28
                },
                {
                    label: '29',
                    value: 29
                },
                {
                    label: '30',
                    value: 30
                },
                {
                    label: '31',
                    value: 31
                },
                {
                    label: '32',
                    value: 32
                },
                {
                    label: '33',
                    value: 33
                },
                {
                    label: '34',
                    value: 34
                },
                {
                    label: '35',
                    value: 35
                },
                {
                    label: '36',
                    value: 36
                },
                {
                    label: '37',
                    value: 37
                },
                {
                    label: '38',
                    value: 38
                },
                {
                    label: '39',
                    value: 39
                },
                {
                    label: '40',
                    value: 40
                },
                {
                    label: '41',
                    value: 41
                },
                {
                    label: '42',
                    value: 42
                },
                {
                    label: '43',
                    value: 43
                },
                {
                    label: '44',
                    value: 44
                },
                {
                    label: '45',
                    value: 45
                },
                {
                    label: '46',
                    value: 46
                },
                {
                    label: '47',
                    value: 47
                },
                {
                    label: '48',
                    value: 48
                },
                {
                    label: '49',
                    value: 49
                },
                {
                    label: '50',
                    value: 50
                },
            ],
        }
    },

    created() {
        this.fetchData();
        this.readQueryParams();
    },

    methods: {
        onClearFilter() {
            this.filter = {
                location: null,
                connections: null,
                communities: null,
                age: null,
            }
            this.router.push({ query: {}})
        },
        readQueryParams() {
            const params = this.$route.query
            if (params.filter) {
                const filter = JSON.parse(params.filter)
                this.filter = filter
            }
        },
        async fetchData() {
            let data = await fetch("/storage/data/stmlnportal.com.json").then(r => r.json());
            this.items = data;
            this.getLocationOptions();
        },
        getLocationOptions() {
            let options = {};
            this.items.forEach(item => {
                options[item.Location] = true;
            });

            _.keys(options).forEach(item => {
                this.locationOptions = [
                    ...this.locationOptions,
                    {
                        label: item,
                        value: item.replaceAll(/\s+/g, '-').toLowerCase()
                    },
                ]
            })
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
        getValueRow(item, name, separator = ',') {
            item = item[name]
            return item ? item.split(separator) : []
        },
    },

    computed: {
        itemsFiltered() {
            return this.items.filter(item => {
                const communities = this.getValueRow(item, 'Community', ',').map(item => item.toLowerCase());
                const location =  item.Location.replaceAll(/\s+/g, '-').toLowerCase()
                const connections = {'instagram': item.Instagram, 'facebook': item.Facebook, 'pinterest': item.Pinterest, 'youtube' : item.YouTube, 'twitter' : item.Twitter};

                let checkCommunities = true;
                if (this.filter.communities && this.filter.communities.value) {
                    const value = this.filter.communities.value.toLowerCase();
                    checkCommunities = communities.includes(value);
                }

                let checkLocation = true;
                if (this.filter.location && this.filter.location.value) {
                    const value = this.filter.location.value
                    checkLocation = location.includes(value)
                }

                let checkConnections = true;
                if (this.filter.connections && this.filter.connections.value) {
                    const value = this.filter.connections.value
                    let availableConnections = [];
                    for(let conn in connections) {
                        if (connections[conn]) {
                            availableConnections = [
                                ...availableConnections,
                                conn
                            ];
                        }
                    }
                    checkConnections = availableConnections.includes(value)
                }

                let checkAge = true;
                if (this.filter.age && this.filter.age.value) {
                    checkAge = this.filter.age.value === item.Age;
                }
                
                return checkLocation && checkCommunities && checkConnections && checkAge;
            });
        },
        currentView() {
            return this.filter.communities && this.filter.communities.value ? 'search' : 'communities'
        },
    },
}
</script>
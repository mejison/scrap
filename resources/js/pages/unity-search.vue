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
                :account-created-options="accountCreatedOptions"
                :celebrity-options="celebrityOptions"
                :education-options="educatinOptions"
                
                :ethnicity-options="ethnicityOptions"
                :audience-authenticity-options="audienceAuthenticityOptions"
                :gender-options="genderCreatorOptions"
                :income-options="incomeOptions"
                :sponsorship-index-options="sponsorshipIndexOptions"

                :lastlogin-options="lastLoginOptions"
                :relationship-status-options="relationshipStatusOptions"

                :insigns-options="insignsOptions"
                :language-options="languageOptions"
                :age-audience-options="ageAudienceOptions"

                @clear="onClearFilter"
                @input="onChangeFilter"
                ></filter-unity-search>
                <div class="col-12" id="content">
                    <unity-search-results 
                        :items="items"
                    />
                    <pagination 
                        :current="filter.page"
                        :total="filter.total"
                        :per-page="filter.per_page"
                        @page="onClickPage"
                    />
                    <loader />
                </div>
        </div>
    </div>
</template>

<script>
import FilterUnitySearch from '../components/filters/unity-search.vue'
import UnitySearchResults from '../components/unity-search-results.vue';
import Pagination from '../components/pagination.vue'
import loader from '../components/loader.vue'
import _ from 'lodash';
import requestMixin from '../mixins/requestMixin';
import { mapState } from 'vuex';
import countries from '../countries.js';
import { mapActions } from 'vuex';

export default {
    name: 'discovery',

    components: {
        FilterUnitySearch,
        UnitySearchResults,
        Pagination,
        loader,
    },

    mixins: [
        requestMixin,
    ],

    data() {
        return {
            countries,
            locationOptions: [
                {
                    label: 'Any',
                    value: null,
                },
            ],
            connectionsOptions: [
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
                    value: 'video_games',
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
            accountCreatedOptions: [
                {
                    label: 'Last 7 Days',
                    value: '-7'
                },
                {
                    label: '7 to 14 Days',
                    value: '7-14'
                },
                {
                    label: '14 to 30 Days',
                    value: '14-30'
                },
                {
                    label: 'Older than 30 Days',
                    value: '30-'
                },
            ],
            celebrityOptions: [
                {
                    label: 'Celebrities',
                    value: true
                },
                {
                    label: 'Non-Celebrities',
                    value: false
                },
            ],
            educatinOptions: [
                {
                    label: "Some High School",
                    value: "some_high_school"
                },
                {
                    label: "High School Diploma/GED",
                    value: "high_school"
                },
                {
                    label: "In College",
                    value: "in_college",
                },
                {
                    label: "Some College",
                    value: "some_college",
                },
                {
                    label: "Associate's Degree",
                    value: "associate_degree",
                },
                {
                    label: "Bachelor's Degree",
                    value: "college_degree",
                },  
                {
                    label: "Master's or Higher",
                    value: "graduate_degree",
                },    
            ],

            ethnicityOptions: [
                {
                    label: 'Asian',
                    value: 'asian',
                },
                {
                    label: 'Black / African American',
                    value: 'black',
                },
                {
                    label: 'Hawaiian Native',
                    value: 'hawaiian',
                },
                {
                    label: 'Hispanic / Latino',
                    value: 'hispanic',
                },
                {
                    label: 'Native American / Alaska Native',
                    value: 'native',
                },
                {
                    label: 'Other',
                    value: 'other',
                },
                {
                    label: 'White / Caucasian',
                    value: 'white',
                },
            ],
            audienceAuthenticityOptions: [
                {
                    label: 'Fair (<30%)',
                    value: 3,
                },
                {
                    label: 'Good (30 - 70%)',
                    value: 2,
                },
                {
                    label: 'Great (>70%)',
                    value: 1,
                },
            ],
            genderCreatorOptions: [
                {
                    label: 'Male',
                    value: 'male',
                },
                {
                    label: 'Female',
                    value: 'female',
                },
                {
                    label: 'Not Specified',
                    value: 'not_specified',
                },
            ],
            incomeOptions: [
                {
                    label: 'Under $20k',
                    value: '0to20',
                },
                {
                    label: '$20 - $40k',
                    value: '20to40',
                },
                {
                    label: '$40 - $50k',
                    value: '40to50',
                },
                {
                    label: '$50 - $75k',
                    value: '50to75',
                },
                {
                    label: '$75 - $100k',
                    value: '75to100',
                },
                {
                    label: '$100 - $150k',
                    value: '100to150',
                },
                {
                    label: '$150k',
                    value: '150to0',
                },
            ],
            sponsorshipIndexOptions: [
                {
                    label: 'Low (<20% Sponsored)',
                    value: 'low',
                },
                {
                    label: 'Medium (20 - 50% Sponsored)',
                    value: 'medium',
                },
                {
                    label: 'High (>50% Sponsored)',
                    value: 'high',
                },
            ],

            lastLoginOptions: [
                {
                    label: 'Last 7 Days',
                    value: '0to7',
                },
                {
                    label: '7 to 14 Days',
                    value: '7to14',
                },
                {
                    label: '14 to 30 Days',
                    value: '14to30',
                },
                {
                    label: 'Older than 30 Days',
                    value: '0to30',
                },
            ],

            relationshipStatusOptions: [
                {
                    label: 'Single',
                    value: 'single',
                },
                {
                    label: 'In a Relationship',
                    value: 'in_a_relationship',
                },
                {
                    label: 'Newlaywed',
                    value: 'newlaywed',
                },
                {
                    label: 'Married',
                    value: 'married',
                },
                {
                    label: 'Divorced',
                    value: 'divorced',
                },
                {
                    label: 'Widowed',
                    value: 'widowed',
                },
            ],
            insignsOptions: [],
            languageOptions: [],
            ageAudienceOptions: [
                {
                    label: '17 Under',
                    value: '17'
                },
                {
                    label: '18 to 24',
                    value: '18to24'    
                },
                {
                    label: '25 to 34',
                    value: '25to34'
                },
                {
                    label: '35 to 44',
                    value: '35to44'
                },
                {
                    label: '45 to 54',
                    value: '45to54'    
                },
                {
                    label: '55 to 64',
                    value: '55to64'
                },
                {
                    label: '65 Plus',
                    value: '65'
                },
            ],
        }
    },

    mounted() {
        this.fetchData();
        this.initLocationOptions();
    },

    methods: {
        ...mapActions("unity", ['setFilter']),
        initLocationOptions() {
            for(var c in this.countries) {
                this.locationOptions = [
                    ...this.locationOptions,
                    {
                        label: this.countries[c],
                        value: c
                    }
                ]
            }
        },
        onClearFilter() {
            this.setFilter({
                location: {
                    'location-radius': 5,
                    'radius-search': [],
                    'state-country': [],
                },
                connections: [],
                communities: [],
                age: [0, 120],
                accountcreated: null,
                celebrity: null,
                education: null,
                
                education: null,
                education: null,
                education: null,
                education: null,
                
                
                page: 1,
                per_page: 10,
                total: 0,
                search: '',
            })
            this.fetchData();
        },
        readQueryParams() {
            const params = this.$route.query
            if (params.filter) {
                const filter = JSON.parse(params.filter)
                this.setFilter(filter);
            }
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
            this.setFilter({
                ...this.filter,
                communities: {
                    label: community.name,
                    value: community.name.toLowerCase()
                }
            });
        },
        getValueRow(item, name, separator = ',') {
            item = item[name]
            return item ? item.split(separator) : []
        },
    },

    computed: {
        ...mapState('unity', ["items"]),
    },
}
</script>

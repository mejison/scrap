<template>
    <div class="col-xl-12">
        <div class="d-lg-flex d-block pl-0 pr-0 border-0 align-items-end justify-content-between mb-3">
            <div>
                <a href="javascript:void(0);" class="btn bg-white mb-2 mr-2">
                    <svg width="14" height="14" class="scale5" viewBox="0 0 20 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 2.25H8.5C8.5 1.42275 7.82725 0.75 7 0.75H5.5C4.67275 0.75 4 1.42275 4 2.25H1C0.586 2.25 0.25 2.58525 0.25 3C0.25 3.41475 0.586 3.75 1 3.75H4C4 4.57725 4.67275 5.25 5.5 5.25H7C7.82725 5.25 8.5 4.57725 8.5 3.75H19C19.414 3.75 19.75 3.41475 19.75 3C19.75 2.58525 19.414 2.25 19 2.25ZM5.5 3.75V2.25H7L7.00075 2.997C7.00075 2.9985 7 2.99925 7 3C7 3.00075 7.00075 3.0015 7.00075 3.003V3.75H5.5Z" fill="#2E2E2E"/>
                        <path d="M19 8.25H14.5C14.5 7.42275 13.8273 6.75 13 6.75H11.5C10.6727 6.75 10 7.42275 10 8.25H1C0.586 8.25 0.25 8.58525 0.25 9C0.25 9.41475 0.586 9.75 1 9.75H10C10 10.5773 10.6727 11.25 11.5 11.25H13C13.8273 11.25 14.5 10.5773 14.5 9.75H19C19.414 9.75 19.75 9.41475 19.75 9C19.75 8.58525 19.414 8.25 19 8.25ZM11.5 9.75V8.25H13L13.0007 8.997C13.0007 8.9985 13 8.99925 13 9C13 9.00075 13.0007 9.0015 13.0007 9.003V9.75H11.5Z" fill="#2E2E2E"/>
                        <path d="M19 14.25H8.5C8.5 13.4227 7.82725 12.75 7 12.75H5.5C4.67275 12.75 4 13.4227 4 14.25H1C0.586 14.25 0.25 14.5853 0.25 15C0.25 15.4148 0.586 15.75 1 15.75H4C4 16.5773 4.67275 17.25 5.5 17.25H7C7.82725 17.25 8.5 16.5773 8.5 15.75H19C19.414 15.75 19.75 15.4148 19.75 15C19.75 14.5853 19.414 14.25 19 14.25ZM5.5 15.75V14.25H7L7.00075 14.997C7.00075 14.9985 7 14.9992 7 15C7 15.0008 7.00075 15.0015 7.00075 15.003V15.75H5.5Z" fill="#2E2E2E"/>
                    </svg>
                </a>
                <communitydropdown label="Communities" v-model="payload.communities" :options="communitiesOptions" @input="onChange" />
                <dropdown label="Location(Creator)" v-model="payload.location" :options="locationOptions" @input="onChange" />
                <!-- <dropdown label="Connections" v-model="payload.connections" :options="connectionsOptions" @input="onChange" /> -->
                <dropdown label="Age(Creator)" v-model="payload.age" :options="ageOptions" @input="onChange" />
                
                <connectiondropdown label="Connections" v-model="payload.connections" :options="connectionsOptions" @input="onChange" />

                <a href="javascript:void(0);" class="btn ml-auto" @click.prevent="onClickClear">
                    Clear filter
                </a>
            </div>
        </div>
    </div>
</template>

<script>
import dropdown from '../dropdown.vue';
import connectiondropdown from '../connection-dropdown.vue'
import communitydropdown from '../community-dropdown.vue'

export default {
    name: "filter-unity-search",

    components: {
        dropdown,
        connectiondropdown,
        communitydropdown,
    },

    props: {
        value: {
            type: Object,
            default: () => ({}),
        },
        'location-options': {},
        'connections-options': {},
        'network-options': {},
        'communities-options': {},
        'age-options': {},
    },

    data() {
        return {
            payload: this.value,
        }
    },

    watch: {
        value() {
            this.payload = this.value
            this.setQueryParams()
        },
    },

    methods: {
        onClickClear() {
            this.$emit('clear')
            // this.$router.push({});
        },
        onChange() {
            this.$emit('input', this.payload)
            this.setQueryParams()
        },
        setQueryParams() {
            this.$router.push({ query: { filter: JSON.stringify({
                ...this.payload,
                total: 0,
                page: 1,
            }) }}).catch(()=>{});
        },
    },
}
</script>

<style lang="scss">
    
</style>
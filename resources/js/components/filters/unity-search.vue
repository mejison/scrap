<template>
    <div class="col-xl-12">
        <div class="d-lg-flex d-block pl-0 pr-0 border-0 align-items-end justify-content-between mb-3">
            <div>
                <communitydropdown label="Communities" v-model="payload.communities" :options="communitiesOptions" @input="onChange" />
                <locationdropdown label="Location(Creator)" v-model="payload.location" :options="locationOptions" @input="onChange" />
                <agedropdown label="Age(Creator)" v-model="payload.age" :options="ageOptions" @input="onChange" />
                <connectiondropdown label="Connections" v-model="payload.connections" :options="connectionsOptions" @input="onChange" />
                <accountcreateddropdown label="Account Created" v-model="payload.accountcreated" :options="accountCreatedOptions" @input="onChange" />
                <celebritydropdown label="Celebrity" v-model="payload.celebrity" :options="celebrityOptions" @input="onChange" />

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
import locationdropdown from '../location-dropdown.vue'
import agedropdown from '../age-dropdown.vue'
import accountcreateddropdown from '../accountcreateddropdown.vue';
import celebritydropdown from '../celebritydropdown.vue';

export default {
    name: "filter-unity-search",

    components: {
        dropdown,
        agedropdown,
        connectiondropdown,
        communitydropdown,
        locationdropdown,
        accountcreateddropdown,
        celebritydropdown,
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
        'account-created-options': [],
        'celebrity-options': [],
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
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
                <educationdropdown label="Education" v-model="payload.education" :options="educationOptions" @input="onChange" />
                
                <ethnicitydropdown label="Ethnicity" v-model="payload.ethnicity" :options="ethnicityOptions" @input="onChange" />
                <audienceauthenticity label="Audience Authenticity" v-model="payload.audienceauthenticity" :options="audienceAuthenticityOptions" @input="onChange" />
                <gendercreatordropdown label="Gender (Creator)" v-model="payload.gender" :options="genderOptions" @input="onChange" />
                <incomedropdown label="Income" v-model="payload.income" :options="incomeOptions" @input="onChange" />
                <sponsorshipindexdropdown label="Sponsorship Index" v-model="payload.sponsorshipindex" :options="sponsorshipIndexOptions" @input="onChange" />

                <lastlogindropdown label="Last Login" v-model="payload.lastlogin" :options="lastloginOptions" @input="onChange" />
                <relationshipstatusdropdown label="RelationShip Status" v-model="payload.relationshipstatus" :options="relationShipStatusOptions" @input="onChange" />

                <ageaudiencedropdown label="Age (Audience)" v-model="payload.ageaudience" :options="ageOptions" @input="onChange" />
                <genderaudiencedropdown label="Insights (Audience)" v-model="payload.genderaudience" :options="insightsOptions" @input="onChange" />
                <insightsaudiencedropdown label="Location (Audience)" v-model="payload.locationaudience" :options="locationOptions" @input="onChange" />
                <languageaudiencedropdown label="Language (Audience)" v-model="payload.ageaudienceoptions" :options="ageAudienceOptions" @input="onChange" />
                
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
import educationdropdown from '../educationdropdown.vue';

import ethnicitydropdown from '../ethnicity-dropdown.vue';
import audienceauthenticity from '../audience-authenticity.vue';
import gendercreatordropdown from '../gender-creator-dropdown.vue';
import incomedropdown from '../income.vue';
import sponsorshipindexdropdown from '../sponsorship-index.vue';
import lastlogindropdown from '../lastlogin-dropdown.vue';
import relationshipstatusdropdown from '../relationship-status-dropdown.vue';

import ageaudiencedropdown from '../age-audience-dropdown.vue'
import genderaudiencedropdown from '../gender-audience-dropdown.vue'
import insightsaudiencedropdown from '../insights-audience-dropdown.vue'
import languageaudiencedropdown from '../language-audience-dropdown.vue'

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
        educationdropdown,

        ethnicitydropdown,
        audienceauthenticity,
        gendercreatordropdown,
        incomedropdown,
        sponsorshipindexdropdown,
        lastlogindropdown,
        relationshipstatusdropdown,

        ageaudiencedropdown,
        genderaudiencedropdown,
        insightsaudiencedropdown,
        languageaudiencedropdown,
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
        'education-options': [],

        'ethnicity-options': [],
        'audience-authenticity-options': [],
        'gender-options': [],
        'sponsorship-index-options': [],
        'income-options': [],

        'lastlogin-options': [],
        'relationship-status-options': [],

        'insigns-options': [],
        'language-options': [],
        'age-audience-options': [],
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
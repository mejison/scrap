<template>
    <div class="state-country">
        <top-location 
            type="states_and_countries" 
            :top="topLocation"
            v-model="selectedLocations"
            @input="onChange"
        />
    </div>
</template>

<script>
import topLocation from './top-location.vue'

export default {
    name: 'StateCountry',

    components: {
        topLocation,
    },

    props: {
        value: {
            type: Object,
            default: () => ({}),
        },
    },

    data() {
        return {
            query: '',
            selectedLocations: this.value ? this.value['state-country'] : [],
            milesOptions: [
                {
                    label: 'Within 5 miles of',
                    value: 5,
                },
                {
                    label: 'Within 10 miles of',
                    value: 10,
                },
                {
                    label: 'Within 25 miles of',
                    value: 25,
                },
                {
                    label: 'Within 50 miles of',
                    value: 50,
                },
                {
                    label: 'Within 100 miles of',
                    value: 100,
                },
            ],
            topLocation: [
                {
                    country: "US",
                    id: "US",
                    label: "United States",
                },
                {
                    country: "US",
                    id: "NY, US",
                    label: "New York, US",
                    state: "NY",
                    state_name: "New York",
                },
                {
                    country: "US",
                    id: "CA, US",
                    label: "California, US",
                    state: "CA",
                    state_name: "California",
                }
            ],
        }
    },

    methods: {
        onChange() {
            this.$emit('input', {event: 'state-country', data: this.selectedLocations})
        },
    }
}
</script>
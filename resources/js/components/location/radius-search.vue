<template>
    <div class="radius-search">
       <div>
            <dropdown label="Within 5 miles of" v-model="radius" :options="milesOptions" @input="onChangeRadius" />
       </div>
        <top-location 
            type="platform_cities" 
            :top="topLocation" 
            v-model="selectedLocations"
            @input="onChange"
        />
    </div>
</template>

<script>
import dropdown from '../dropdown.vue'
import topLocation from './top-location.vue'

export default {
    name: 'RadiusSearch',

    props: {
         value: {
            type: Object,
            default: () => ({}),
        },
    },

    components: {
        dropdown,
        topLocation,
    },

    data() {
        return {
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
                    label: 'Los Angeles, CA, US',
                    value: 'Los Angeles, CA, US',
                },
                {
                    label: 'New York City, NY, US',
                    value: 'New York City, NY, US',
                },
                {
                    label: 'Seattle, WA, US',
                    value: 'Seattle, WA, US',
                }
            ],
            selectedLocations: this.value ? this.value['radius-search'] : [],
            radius: this.value ? this.value['location-radius'] : 5,
        }
    },

    methods: {
        onChangeRadius() {
            this.$emit('input', {event: 'location-radius', data: this.radius.value})
        },
        onChange() {
            this.$emit('input', {event: 'radius-search', data: this.selectedLocations})
        },
    },
}
</script>

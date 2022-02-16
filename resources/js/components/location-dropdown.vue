<template>
    <div class="location">
        <div class="btn bg-white d-flex align-items-center" @click.prevent="onToggle">
            <div class="text-left mr-3">
                <span class="text-black">{{ getLabel }}</span>
            </div>
            <i class="fa fa-caret-down"></i>
        </div>
        <div class="menu-right" :class="{'show': isShow}">
               <div class="location-dropdown card card-body">
                    <div class="tabs-btn">
                        <a href="#"
                            :class="{'active': active == 'radius-search'}" 
                            @click.prevent="active = 'radius-search'">
                            Radius<br />
                            Search
                        </a>
                        <a href="#"
                            :class="{'active': active == 'state-country'}" 
                            @click.prevent="active = 'state-country'">
                            State/Country
                        </a>
                    </div>
                    <div class="tab">
                        <!-- <keep-alive> -->
                            <component :is="active" :value="payload" @input="onChange"></component>
                        <!-- </keep-alive> -->
                    </div>
                </div>
        </div>
    </div>

</template>

<script>
import RadiusSearch from '../components/location/radius-search.vue'
import StateCountry from '../components/location/state-country.vue'

export default {
    name: 'LocationDropdown',

    components: {
        RadiusSearch,
        StateCountry,
    },

    data() {
        return {
            active: 'radius-search',
            payload: {
                'location-radius': 5,
                'radius-search': [],
                'state-country': [],
            },
            isShow: false,
        }
    },

    mounted() {
        document.body.addEventListener('click', (e) => {
            const target = e.target;
            if ( ! target.closest(".location")) {
                this.isShow = false;
            }
        }, false);
    },

    methods: {
        onToggle() {
            this.isShow = ! this.isShow
        },
        onChange({ event, data }) {
            this.payload = {
                ...this.payload,
                [event]: data
            }

            if (['state-country'].includes(event)) {
                 this.payload = {
                    ...this.payload,
                    'location-radius': 5,
                    'radius-search': [],
                }
            }

            if (['location-radius'].includes(event)) {
                 this.payload = {
                    ...this.payload,
                    'state-country': [],
                }
            }

            if (['radius-search'].includes(event)) {
                 this.payload = {
                    ...this.payload,
                    'state-country': [],
                }
            }

            this.$emit('input', this.payload)
        },
    },

    computed: {
        getLabel() {
            if (this.payload['state-country'] && this.payload['state-country'].length == 1) {
                const location = JSON.parse(this.payload['state-country']);
                return location.label;
            }

            if (this.payload['radius-search'] && this.payload['radius-search'].length == 1) {
                const location = JSON.parse(this.payload['radius-search']);
                return location.label;
            }

            if ( ! this.payload['state-country'].length && ! this.payload['radius-search'].length) {
                return "Location";
            }

            return "Multiple Locations";
        }
    }
}
</script>

<style lang="scss" scoped>
    .location {
        position: relative;
        display: inline-block;

        .menu-right {
            position: absolute;
            z-index: -1;
            top: 50px;
            left: 0;
            width: 400px; 
            opacity: 0; 
            visibility: hidden; 

            &.show {
                opacity: 1;
                z-index: 1001;
                visibility: visible;
            }
        }
    }

    .location-dropdown {
        max-width: 400px;
        
        .tabs-btn {
            display: flex;
            justify-content: space-around;
            align-items: center;

            .active {
                font-weight: 600;
            }
        }
    }
</style>
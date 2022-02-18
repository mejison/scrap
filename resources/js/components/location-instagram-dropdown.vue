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
                <input 
                    type="text" 
                    v-model="searchQuery"
                    class="search-field"
                    @input="search" 
                    placeholder="Add Location"
                />

                <div class="results">
                    <span v-if="load">
                        searching ...
                    </span>
                    <div class="result" 
                        v-for="(result, index) in results"
                        @click.prevent="onSelect(result)"
                        :key="index">
                        {{ result.label }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import vizMixin from '../mixins/vizMixin';
import _debounce from 'lodash/debounce'

export default {
    name: 'location-instagram-dropdown',

    props: {
        value: {
            type: [String, Object],
            default: () => '',
        },
    },

    data() {
        return {
            isShow: false,
            searchQuery: '',
            results: [],
            load: false,
            selected: this.value ? this.value : null,
        }
    },

    mixins: [
        vizMixin,
    ],

    mounted() {
        document.body.addEventListener('click', (e) => {
            const target = e.target;
            if ( ! target.closest(".location")) {
                this.isShow = false;
            }
        }, false);
    },

    methods: {
        onSelect(item) {
            this.selected = item.label;
            this.results = [];
            this.searchQuery = '';
            this.isShow = false;
            this.$emit('input', this.selected);
        },
        onToggle() {
            this.isShow = !this.isShow
        },
        search() {
            this.updateValue();
        },
        async onSearch() {
            this.load = true;
            this.results = [];
            const { meta: { suggestions } } = await this.searchLocationInstagram(this.searchQuery);
            this.results = suggestions.instagram_location;
            this.load = false;
        },
        updateValue: _debounce(function () {
            this.onSearch();
        }, 600),
    },

    computed: {
        getLabel() {
            return this.value ? this.value : 'Instagram Post Location';
        },
    },
}
</script>

<style lang="scss" scoped>
    .location {
        position: relative;
        display: inline-block;

        .search-field {
            border-radius: 4px;
            padding: 5px 10px;
            border: 1px solid #333;
        }

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

        .results {
            .result {
                cursor: pointer;
            }
        }
    }
</style>
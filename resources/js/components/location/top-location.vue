<template>
    <div>
        <div class="search-field">
            <input type="text" class="search" v-model="query" placeholder="Add Location" @input="onSearch" />
            <div class="results" v-if="results && results.length">
                <div
                    class="result-item"
                    v-for="(item, index) in results"
                    @click.prevent.stop="onSelect(item)"
                    :key="`result-${type}-${index}`">
                     {{ ['states_and_countries'].includes(type) ? item.label : item.name }}
                </div>
            </div>
        </div>
        <div>
            <div 
                v-for="(item, index) in added"
                :key="`added-${type}-${index}`">
                <label>
                    <input 
                        type="checkbox"
                        name="location"
                        :value="['states_and_countries'].includes(type) ? JSON.stringify(item) : JSON.stringify({label: item.name, value: item.name})" 
                        v-model="selectedLocations" 
                        @change="onChange"
                    />
                    &nbsp;
                   {{ ['states_and_countries'].includes(type) ? item.label : item.name }}
                </label>
            </div>
        </div>
        <span class="mb-2 d-block">TOP LOCATIONS</span>
        <ul>
            <li v-for="(location, index) in top" :key="`top-${index}`">
                <label>
                    <input type="checkbox" name="location" :value="JSON.stringify(location)" v-model="selectedLocations" @change="onChange"  />
                    &nbsp;
                    {{ location.label }}
                </label>
            </li>
        </ul>
    </div>
</template>

<script>
import requestMixin from '../../mixins/requestMixin';
export default {
    name: 'top-location',

    props: {
        type: {
            type: String,
            default: 'platform_cities',
        },
        top: {
            type: Array,
            default: () => ([]),
        },
        value: {
           type: Array,
            default: () => ([]),
        }
    },

    data() {
        return {
            query: '',
            selectedLocations: this.value ? this.value : [],
            results: [],
            added: [],
        }
    },

    mixins: [requestMixin],

    methods: {
       async onSearch() {
            let { data : { attributes : { options } } } = await this.searchLocation(this.query, this.type);
            options = options.filter(item => {
                if ( ! ['states_and_countries'].includes(this.type)) {
                    const exist = this.added.find(res => res.name.toLowerCase() == item.name.toLowerCase());
                    const topExist = this.top.find(res => res.label.toLowerCase() == item.name.toLowerCase());
                   
                    return ! exist && ! topExist;
                } else {
                    const exist = this.added.find(res => res.id == item.id);
                    const topExist = this.top.find(res => res.id == item.id);
                   
                    return ! exist && ! topExist;
                }
            })
            this.results = [...options];
        },
        onSelect(item) {
            this.added = [
                ...this.added,
                item
            ]
            this.query = '';
            this.results = [];
            this.addManually(item)
        },
        addManually(item) {
            item = ['states_and_countries'].includes(this.type) ? JSON.stringify(item) : JSON.stringify({label: item.name, value: item.name});
            this.selectedLocations = [
                ...this.selectedLocations,
                item
            ]
            this.onChange();
        },
        onChange() {
            this.$emit('input', this.selectedLocations)
        }
    }
}
</script>


<style lang="scss" socped>
    .search {
        margin: 10px 0;
        border-radius: 5px;
        border: 1px solid #999;
        padding: 5px;
        width: 100%;
    }

    .search-field {
        position: relative;

        .results {
            background-color: #fff;
            max-height: 400px;
            overflow: auto;
            position: absolute;
            z-index: 1001;
            left: -3px;
            right: -3px;
            top: 50px;
            padding: 15px;
            border: 1px solid #999;
            border-radius: 3px;

            .result-item {
                cursor: pointer;
                margin-bottom: 5px;
            }
        }
    }
</style>

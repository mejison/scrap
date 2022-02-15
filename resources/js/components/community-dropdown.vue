<template>
    <div class="dropdown custom-dropdown mb-2">
        
        <div class="btn bg-white d-flex align-items-center" data-toggle="dropdown">
            <div class="text-left mr-3">
                <span class="text-black">{{ value && value.length ? (value.length >= 2 ? "Multiple Communities" : value.map(item => item).join(', ')) : label }}</span>
            </div>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
        </div>
        <div class="dropdown-menu dropdown-menu-right">
            <input
                type="text"
                v-model="query"
                placeholder="Add Community"
                class="search"
            />
            <ul @click.stop>
                <li class="dropdown-item" 
                    @click="onAdd(item)" 
                    v-for="(item, index) in optionsFinded" 
                    :key="`search-${index}`">
                    {{ item.value }}
                </li>
            </ul>
            <label
                class="dropdown-item" 
                v-for="(option, index) in fined" 
                :key="`fined-${index}`"
                @click.stop
                >
                <input 
                    @change.stop.prevent="onSelect(option)" 
                    type="checkbox"
                    :value="option.value"
                    name="selected" 
                    v-model="payload"
                />
                &nbsp; {{ option.label }}
            </label>
            <div class="ml-3">
                Top Communities
            </div>
            <label
                class="dropdown-item" 
                v-for="(option, index) in added" 
                :key="`top-${index}`"
                @click.stop
                >
                <input 
                    @change.stop.prevent="onSelect(option)" 
                    type="checkbox"
                    :value="option.value"
                    name="selected" 
                    v-model="payload"
                />
                &nbsp; {{ option.label }}
            </label>
        </div>
    </div>
</template>

<script>

export default {
    name: 'CommunitiesDropDown',

    props: {
        label: {
            default: "CommunitiesDropDown",
            type: String,
        },
        options: {
            default: [],
            type: Array
        },
        value: {
            type: Array,
            default: () => ([])
        },
    },

    data() {
        return {
            payload: [],
            query: '',
            fined: [],
            added: this.options.slice(0, 4),
        }
    },

    methods: {
        onSelect() {
            this.$emit('input', this.payload);
        },
        onAdd(item) {
            this.fined = [
                ...this.fined,
                item
            ]
            this.query = ''
        }
    },

    computed: {
        optionsFinded() {
            if (this.query) {
                return this.options.filter((item) => {
                    const exist = this.added.find(row => row.label == item.label);
                    return ! exist &&  item.value.indexOf(this.query) + 1;
                });
            }
        },
    },
}
</script>

<style lang="scss" scoped>
    .dropdown-menu {
        max-height: 300px;
        overflow: auto;
        padding: 10px 15px;
    }

    .range-from,
    .range-to {
        border-radius: 4px;
        border: 1px solid #999;
        padding-left: 5px;
        max-width: 100px;
    }

    .search {
        border-radius: 5px;
        border: 1px solid #999;
        padding: 5px;
    }
</style>
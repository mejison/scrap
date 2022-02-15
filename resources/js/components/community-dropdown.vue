<template>
    <div class="dropdown custom-dropdown mb-2 community">
        <div class="btn bg-white d-flex align-items-center" @click="onToggle">
            <div class="text-left mr-3">
                <span class="text-black">{{ value && value.length ? (value.length >= 2 ? "Multiple Communities" : value.map(item => item).join(', ')) : label }}</span>
            </div>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
        </div>
        <div class="menu-right p-3" :class="{'show': isShow}">
            <input
                type="text"
                placeholder="Add Community"
                class="search"
                v-model="query"
            />
            <ul>
                <li 
                    @click="onAdd(item)" 
                    v-for="(item, index) in optionsFinded" 
                    :key="`search-${index}`">
                    {{ item.value }}
                </li>
            </ul>
            <label
               
                v-for="(option, index) in fined" 
                :key="`fined-${index}`"
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
                
                v-for="(option, index) in added" 
                :key="`top-${index}`"
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
            isShow: false,
        }
    },

    mounted() {
        document.body.addEventListener('click', (e) => {
            const target = e.target;
            if ( ! target.closest(".community")) {
                this.isShow = false;
            }
        }, false);
    },


    methods: {
        onToggle() {
            this.isShow = ! this.isShow
        },
        onSelect() {
            this.$emit('input', this.payload);
        },
        onFocus() {
            // this.query = ' '
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

    .community {
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
            background-color: #fff;
            display: flex;
            flex-direction: column;
            border-radius: 20px;
            box-shadow: 0px 6px 24px 0px rgb(53 55 81 / 6%);

            &.show {
                opacity: 1;
                z-index: 99;
                visibility: visible;
            }
        }
    }
</style>
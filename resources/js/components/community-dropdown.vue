<template>
    <div class="dropdown custom-dropdown mb-2 community">
        <div class="btn bg-white d-flex align-items-center" @click="onToggle">
            <div class="text-left mr-3">
                <span class="text-black">{{ value && value.length ? (value.length >= 2 ? "Multiple Communities" : getLabel(value)) : label }}</span>
            </div>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
        </div>
        <div class="menu-right p-3" :class="{'show': isShow}">
            <div class="search-box">
                <input
                    type="text"
                    placeholder="Add Community"
                    class="search"
                    v-model="query"
                    @focus="onFocus"
                    @input="onInput"
                    @blur="onBlur"
                />
                <ul class="results" :class="{'show': isShowSearch}">
                    <li 
                        @click.prevent.stop="onAdd(item)" 
                        v-for="(item, index) in optionsFinded" 
                        :key="`search-${index}`">
                        {{ item.label }}
                    </li>
                </ul>
            </div>
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
            added: [
                {
                    label: 'Food',
                    value: 'food'
                },
                {
                    label: 'Lifestyle',
                    value: 'lifestyle'
                },
                {
                    label: 'Family',
                    value: 'family'
                },
            ],
            isShow: false,
            showAll: false,
            isShowSearch: false,
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
        titleCase(str) {
            var splitStr = str.toLowerCase().split(' ');
            for (var i = 0; i < splitStr.length; i++) {
                splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
            }
            return splitStr.join(' '); 
        },
        getLabel(item) {
            const target = this.options.find(row => row.value == item)
            return target ? target.label : item
        },
        onToggle() {
            this.isShow = ! this.isShow
        },
        onSelect() {
            this.$emit('input', this.payload);
        },
        addManually(item) {
            this.payload = [
                ...this.payload,
                item.value,
            ]
            this.onSelect()
        },
        onFocus() {
            if ( ! this.query) {
                this.showAll = true;
                this.isShowSearch = true;
            }
        },
        onBlur() {
            // this.showAll = false;
        },
        onAdd(item) {
            const exist = this.added.find(row => row.label == item.label);

            if ( ! exist) {
                this.fined = [
                    ...this.fined,
                    item
                ]
            }
            
            this.addManually(item)
            this.query = ''
            this.showAll = false;
            this.isShowSearch = false;
        },
        onInput() {
            this.showAll = false;
            if ( ! this.query) {
                this.isShowSearch = false;
            }
        }
    },

    computed: {
        optionsFinded() {
            if (this.query || this.showAll) {
                const items = this.options.filter((item) => {
                    if (this.showAll) {
                        return true;
                    }
                   
                    return item.label.toLowerCase().indexOf(this.query.toLowerCase()) + 1;
                });

                if ( ! items.length) {
                    this.isShowSearch = false;
                } else {
                     this.isShowSearch = true;
                }

                return items;
            }
        },
    },
}
</script>

<style lang="scss" scoped>
    .search-box {
        position: relative;

        .results {
            position: absolute;
            left: 0;
            right: 0;
            top: 55px;
            background-color: #fff;
            display: flex;
            flex-direction: column;
            border-radius: 5px;
            padding: 15px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
            visibility: hidden;
            z-index: -1;
            opacity: 0;

            &.show {
                visibility: visible;
                opacity: 1;
                z-index: 999;
            }

            li {
                cursor: pointer;
            }
        }
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
                z-index: 1001;
                visibility: visible;
            }
        }
    }
</style>
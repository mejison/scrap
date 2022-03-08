<template>
    <div class="dropdown custom-dropdown gender-audience-creator mb-2">
        <div class="btn bg-white d-flex align-items-center" @click.prevent="onToggle">
            <div class="text-left mr-3">
                <span class="text-black">{{ getLabel }}</span>
            </div>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
        </div>
        <div class="menu-right" :class="{'show': isShow}">
            <label 
                v-for="(option, index) in options" 
                :key="index"
                @click.stop
                >
                <input
                    @change.stop.prevent="onSelect(option)" 
                    type="checkbox"
                    :value="option.value"
                    name="selected" 
                    v-model="payload"
                /> &nbsp;
                {{ option.label }}
            </label>
        </div>
    </div>
</template>

<script>

export default {
    name: 'GenderCreatorDropDown',

    props: {
        label: {
            default: "GenderCreatorDropDown",
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
            isShow: false,
        }
    },

    computed: {
        getLabel() {
            return this.value && this.value.length ? (this.value.length >= 2 ? "All Gender" : this.value.map(item => {
                item = this.getOptionByValue(item)
                return item ? item.label : null;
            }).join(' ')) : this.label
        },
    },

    mounted() {
        document.body.addEventListener('click', (e) => {
            const target = e.target;
            if ( ! target.closest(".gender-audience-creator")) {
                this.isShow = false;
            }
        }, false);
    },

    methods: {
        getOptionByValue(value) {
            return this.options.find(item => item.value == value);
        },
        onToggle() {
            this.isShow = ! this.isShow
        },
        onSelect() {
            this.$emit('input', this.payload);
        },
    },
}
</script>

<style lang="scss" scoped>
    .dropdown-menu {
        max-height: 300px;
        overflow: auto;
    }

    .gender-audience-creator {
        position: relative;
        display: inline-block;

        .menu-right {
            position: absolute;
            display: flex;
            flex-direction: column;
            z-index: -1;
            top: 50px;
            left: 0;
            width: 400px; 
            opacity: 0; 
            visibility: hidden; 
            padding: 30px;
            background: #fff;
            box-shadow: 0 10px 40px 0 rgb(32 28 69 / 10%);
            margin-top: 0;
            border-radius: 0.75rem;

            &.show {
                opacity: 1;
                z-index: 1001;
                visibility: visible;
            }
        }
    }
</style>
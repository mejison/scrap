<template>
    <div class="age mb-2">
        <div class="btn bg-white d-flex align-items-center" @click.prevent="onToggle">
            <div class="text-left mr-3">
                <span class="text-black">Age</span>
            </div>
            <i class="fa fa-caret-down"></i>
        </div>
        <div class="menu-right" :class="{'show': isShow}">
            <div class="range flex">
                <input 
                    type="text"
                    class="range-from" 
                    :value="ranges[0]"
                    placeholder="0"
                />
                <span>&nbsp;to&nbsp;</span>
                <input 
                    type="text" 
                    class="range-to" 
                    :value="ranges[1]"
                    placeholder="120"
                />
            </div>
            <vue-range-slider 
                @drag-end="onDragEnd" 
                ref="slider" 
                v-model="ranges" 
                :min="0"
                :max="120"
                tooltip-dir="bottom"
            ></vue-range-slider>
        </div>
    </div>
</template>

<script>
import 'vue-range-component/dist/vue-range-slider.css'
import VueRangeSlider from 'vue-range-component'
import humanformat from 'human-format';

export default {
    name: 'AgeDropDown',

    components: {
        VueRangeSlider
    },

    props: {
        label: {
            default: "AgeDropDown",
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

    created() {
        VueRangeSlider.methods.handleKeyup = ()=> console.log;
        VueRangeSlider.methods.handleKeydown = ()=> console.log;
    },

    watch: {
        value() {
            this.ranges = this.value ? this.value : [0, 120];
        }
    },

    data() {
        return {
            ranges: this.value ? this.value : [0, 120],
            humanformat: humanformat,
            isShow: false,
        }
    },

    mounted() {
        document.body.addEventListener('click', (e) => {
            const target = e.target;
            if ( ! target.closest(".age")) {
                this.isShow = false;
            }
        }, false);
    },

    methods: {
        onToggle() {
            this.isShow = ! this.isShow
        },
        onDragEnd() {
            this.onSelect();
        },
        onSelect() {
            this.$emit('input', this.ranges);
        },
    }
}
</script>

<style lang="scss" scoped>
    .age {
        position: relative;
        display: inline-block;

        .menu-right {
            position: absolute;
            z-index: -1;
            top: 60px;
            left: 0;
            width: 400px; 
            opacity: 0; 
            visibility: hidden; 
            background: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0px 6px 24px 0px rgb(53 55 81 / 6%);

            &.show {
                opacity: 1;
                z-index: 1001;
                visibility: visible;
            }
        }
    }

    .dropdown-menu {
        max-height: 300px;
        overflow: auto;
        padding: 30px;
    }

    .range {
        display: flex;
        justify-content: space-around;
    }

    .range-from,
    .range-to {
        border-radius: 4px;
        border: 1px solid #999;
        padding-left: 5px;
        max-width: 100px;
    }
</style>
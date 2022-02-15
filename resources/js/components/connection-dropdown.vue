<template>
    <div class="dropdown custom-dropdown connection mb-2">
        
        <div class="btn bg-white d-flex align-items-center" @click.prevent="onToggle">
            <div class="text-left mr-3">
                <span class="text-black">{{ value && value.length ? (value.length >= 2 ? "Multiple Platforms" : value.map(item => item.value).join(', ')) : label }}</span>
            </div>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
        </div>
        <div class="menu-right" :class="{'show': isShow}">
            <span 
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
                />
                &nbsp; {{ option.label }}
                <div class="range flex" @click.stop v-if="Object.values(payload).includes(option.value)">
                    <input 
                        type="text"
                        class="range-from" 
                        :value="humanformat(ranges[option.value][0])"
                        placeholder="0"
                    />
                    <span>to</span>
                    <input 
                        type="text" 
                        class="range-to" 
                        :value="humanformat(ranges[option.value][1])"
                        placeholder="5m+"
                    />
                    <span>followers</span>
                    <div>
                        <vue-range-slider 
                            @drag-end="onDragEnd" 
                            @click.stop ref="slider" 
                            v-model="ranges[option.value]" 
                            :min="0"
                            :max="5000000"
                            tooltip-dir="bottom"
                            :step="25000"
                        ></vue-range-slider>
                    </div>
                </div>
            </span>
        </div>
    </div>
</template>

<script>
import 'vue-range-component/dist/vue-range-slider.css'
import VueRangeSlider from 'vue-range-component'
import humanformat from 'human-format';

export default {
    name: 'ConnectionsDropDown',

    components: {
        VueRangeSlider
    },

    props: {
        label: {
            default: "ConnectionsDropDown",
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
            ranges: {},
            humanformat: humanformat,
            isShow: false,
        }
    },

    created() {
        VueRangeSlider.methods.handleKeyup = ()=> console.log;
        VueRangeSlider.methods.handleKeydown = ()=> console.log;
    },

    mounted() {
        this.initRanges()
        document.body.addEventListener('click', (e) => {
            const target = e.target;
            if ( ! target.closest(".connection")) {
                this.isShow = false;
            }
        }, false);
    },

    methods: {
        onToggle() {
            this.isShow = ! this.isShow
        },
        initRanges() {
            this.options.forEach(item => {
                this.ranges[item.value] = [0, 5000000]
            })

            this.ranges = {...this.ranges}
        },
        onDragEnd() {
            this.ranges = {...this.ranges}
            this.onSelect();
        },
        onSelect() {
            let value = [];
            this.payload.forEach((item) => {
                value = [
                    ...value,
                    {
                        value: item,
                        from: this.ranges[item][0] ?  this.ranges[item][0] : 0,
                        to: this.ranges[item][1] ?this.ranges[item][1] : 0,
                    }
                ]
            });

            this.$emit('input', value);
        },
    }
}
</script>

<style lang="scss" scoped>
    .dropdown-menu {
        max-height: 300px;
        overflow: auto;
    }

    .range-from,
    .range-to {
        border-radius: 4px;
        border: 1px solid #999;
        padding-left: 5px;
        max-width: 100px;
    }

    .connection {
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
                z-index: 99;
                visibility: visible;
            }
        }
    }
</style>
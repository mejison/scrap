<template>
    <div class="dropdown custom-dropdown recent-content mb-2">
        
        <div class="btn bg-white d-flex align-items-center" @click.prevent="onToggle">
            <div class="text-left mr-3">
                <span class="text-black">
                    <span class="social" v-if="payload">
                        <i v-if="['InstagramProperty'].includes(payload.attributes.chart_publishable_type)" class="lni lni-instagram"></i>
                        <i v-if="['FacebookProperty'].includes(payload.attributes.chart_publishable_type)" class="lni lni-facebook"></i>  
                        <i v-if="['TwitterProperty'].includes(payload.attributes.chart_publishable_type)" class="lni lni-twitter"></i>  
                        <i v-if="['WebsiteProperty'].includes(payload.attributes.chart_publishable_type)" class="lni lni-website"></i>  
                        <i v-if="['WordPressProperty'].includes(payload.attributes.chart_publishable_type)" class="lni lni-wordpress"></i>  
                        <i v-if="['YouTubeProperty'].includes(payload.attributes.chart_publishable_type)" class="lni lni-youtube"></i> 
                        <i v-if="['BlogProperty'].includes(payload.attributes.chart_publishable_type)" class="lni lni-blogger"></i> 
                        <i v-if="['PinterestPropertyWithProfileReach'].includes(payload.attributes.chart_publishable_type)" class="lni lni-pinterest"></i> 
                    </span>
                    {{ getLabel }}
                </span>
            </div>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
        </div>
        <div class="menu-right" :class="{'show': isShow}">
            <label 
                v-for="(connect, index) in filteredConnections" 
                :key="index"
                @click.stop
                >
                    <div class="text-center connection" @click.prevent="onSelect(connect)">
                        <div class="avatar">
                            <img width="64" height="64" :src="connect.attributes.avatar_url"
                            class="rounded-circle" alt="" />
                        
                            <span class="social">
                                <i v-if="['InstagramProperty'].includes(connect.attributes.chart_publishable_type)" class="lni lni-instagram"></i>
                                <i v-if="['FacebookProperty'].includes(connect.attributes.chart_publishable_type)" class="lni lni-facebook"></i>  
                                <i v-if="['TwitterProperty'].includes(connect.attributes.chart_publishable_type)" class="lni lni-twitter"></i>  
                                <i v-if="['WebsiteProperty'].includes(connect.attributes.chart_publishable_type)" class="lni lni-website"></i>  
                                <i v-if="['WordPressProperty'].includes(connect.attributes.chart_publishable_type)" class="lni lni-wordpress"></i>  
                                <i v-if="['YouTubeProperty'].includes(connect.attributes.chart_publishable_type)" class="lni lni-youtube"></i> 
                                <i v-if="['BlogProperty'].includes(connect.attributes.chart_publishable_type)" class="lni lni-blogger"></i> 
                                <i v-if="['PinterestPropertyWithProfileReach'].includes(connect.attributes.chart_publishable_type)" class="lni lni-pinterest"></i> 
                            </span>
                        </div>
                        <div class="description">
                            <h4 class="text-left">
                                <a :href="connect.attributes.link" target="_blank">{{ connect.attributes.connection_name }}</a>
                            </h4>
                            <div class="text-left">
                                {{ humanformat(connect.attributes.reach) }}
                                Followers ${{ (connect.attributes.asking_price_in_cents / 100).toFixed(2) }}
                            </div>
                        </div>
                    </div>
            </label>
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
        value: {
            type: Array,
            default: () => ([])
        },
        connections: {
            type: Array,
            default: () => ([]),
        },
    },

    data() {
        return {
            humanformat: humanformat,
            isShow: false,
            payload: null,
        }
    },


    mounted() {
        document.body.addEventListener('click', (e) => {
            const target = e.target;
            if ( ! target.closest(".recent-content")) {
                this.isShow = false;
            }
        }, false);
    },


    methods: {
        onToggle() {
            this.isShow = ! this.isShow
        },
       
        onSelect(item) {
            this.payload = item;
            this.isShow = false;
            this.$emit('input', this.payload);
        },
    },

    watch: {
        filteredConnections() {
            this.payload = this.filteredConnections.find(item => item.attributes.chart_publishable_type == 'InstagramProperty');
        }
    },

    computed: {
        getLabel() {
            if (this.payload) {
                return this.payload.attributes.connection_name
            }
            return "Connection"
        },
        filteredConnections() {
            return this.connections.filter(item => ['InstagramProperty', 'PinterestPropertyWithProfileReach'].includes(item.attributes.chart_publishable_type))
        },
    },
}
</script>

<style lang="scss" scoped>
    .recent-content {
        position: relative;
        .menu-right {
            position: absolute;
            left: 0;
            right: 0;
            z-index: 99;
            top: 50px;
            opacity: 0;
            display: flex;
            flex-direction: column;
            visibility: hidden;
            z-index: -1;
            background-color: #fff;
            min-width: 300px;
            padding: 15px;
            border-radius: 8px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;

            .connection {
                display: grid;
                grid-template-columns: 100px 1fr;
                cursor: pointer;

                .avatar {
                    position: relative; 
                    width: 80px;
                    height: 80px;
                
                    .social {
                        position: absolute;
                        bottom: 13px;
                        background: #fff;
                        right: 0px;
                        border: 1px solid #999;
                        border-radius: 50%;
                        width: 25px;
                        height: 25px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        font-size: 12px;
                    }
                }

                .description {
                    color: #8d8d8d;
                    font-size: 14px;
                }
            }

            &.show {
                opacity: 1;
                visibility: visible;
                z-index: 99;
            }
        }
    }
</style>
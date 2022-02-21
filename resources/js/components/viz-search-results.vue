<template>
    <div >
        <div class="items">
            <div 
                class="item" 
                v-for="(item, index) in items" 
                :key="`${index}-key`"
                @click.prevent="onOpen(item)"
                >
                <div class="name">
                    <div class="main-avatar">
                        <img 
                            :src="item.attributes.account_avatar_url" 
                            class="img"
                            alt="avatar"
                        />
                    </div>
                    <div class="intro">
                        <span class="nickname">{{ item.attributes.connection_name }}</span>
                        <div class="followers">
                            {{ humanformat(item.attributes.reach) }} Followers
                        </div>
                    </div>
                    <div>
                        <a href="#" class="more">
                            &middot;
                            &middot;
                            &middot;
                        </a>
                    </div>
                </div>
                <div class="image">
                    <div class="sponsor">
                         <brandmentions 
                            :key="`${index}-brend-${item.attributes.platform}-${item.id}`"
                            :minimize="true" 
                            :item="item" 
                        />
                    </div>
                    <img class="post" :src="item.attributes.content_preview" alt="image" />
                    <span class="social">
                        <li v-if="item.attributes.platform == 'blog'">
                            <i class="lni lni-blog" ></i>
                        </li>
                        <li  v-if="item.attributes.platform == 'instagram'">
                            <i class="lni lni-instagram" ></i> 
                        </li>
                        <li  v-if="item.attributes.platform == 'pinterest'">
                            <i class="lni lni-pinterest" ></i>
                        </li>
                        <li  v-if="item.attributes.platform == 'twitch'">
                            <i class="lni lni-twitch" ></i>
                        </li>
                        <li v-if="item.attributes.platform == 'twitter'">
                            <i class="lni lni-twitter" ></i>
                        </li>
                         <li  v-if="item.attributes.platform == 'wordpress'">
                            <i class="lni lni-wordpress" ></i>
                        </li>
                        <li  v-if="item.attributes.platform == 'youtube'">
                            <i class="lni lni-youtube" ></i>
                        </li>
                        <li v-if="item.attributes.platform == 'tiktok'">
                           <svg  width="52" height="52" viewBox="0 0 64 64"  xmlns="http://www.w3.org/2000/svg">
                             <path stroke="white" stroke-width="3" d="M55.619 1H8.38095C4.3111 1 1 4.3111 1 8.38095V55.619C1 59.6889 4.3111 63 8.38095 63H55.619C59.6889 63 63 59.6889 63 55.619V8.38095C63 4.3111 59.6889 1 55.619 1ZM49.7231 28.0482C49.3846 28.0811 49.0447 28.0984 48.7046 28.0999C46.8681 28.1002 45.0604 27.6431 43.4448 26.7699C41.8291 25.8968 40.4563 24.635 39.4503 23.0986V40.1294C39.4503 42.6189 38.7121 45.0526 37.329 47.1226C35.9458 49.1926 33.9799 50.806 31.6799 51.7587C29.3798 52.7114 26.8489 52.9607 24.4072 52.475C21.9654 51.9893 19.7226 50.7905 17.9622 49.0301C16.2018 47.2697 15.0029 45.0268 14.5172 42.5851C14.0316 40.1433 14.2808 37.6124 15.2335 35.3124C16.1863 33.0123 17.7996 31.0464 19.8696 29.6633C21.9396 28.2801 24.3733 27.5419 26.8629 27.5419C27.1256 27.5419 27.3825 27.5655 27.6408 27.5818V33.7847C27.3825 33.7537 27.1286 33.7065 26.8629 33.7065C25.159 33.7065 23.5249 34.3833 22.3201 35.5881C21.1153 36.7929 20.4385 38.427 20.4385 40.1309C20.4385 41.8347 21.1153 43.4688 22.3201 44.6736C23.5249 45.8784 25.159 46.5552 26.8629 46.5552C30.4116 46.5552 33.5456 43.7593 33.5456 40.2106L33.6076 11.2861H39.5419C39.813 13.8645 40.9818 16.2656 42.844 18.0696C44.7062 19.8735 47.1433 20.9654 49.729 21.1544V28.0482" fill="#52b141"/>
                            </svg>
                        </li>
                    </span>
                </div>
                <div class="info">
                    {{ moment(item.attributes.created_at).format("MMM DD, Y") }} {{ humanformat(item.attributes.engagements) }} Eng.
                </div>
                <div class="description">
                   {{ item.attributes.highlight }}
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import HumanFormat from  'human-format';
import numeral from 'numeral';
import moment from 'moment'
import vizMixin from '../mixins/vizMixin';
import brandmentions from '../components/brand-mentions.vue'

export default {
    name: 'Search',

    props: {
        items: {
            type: Array,
            default: [],
        },
    },

    components: {
        brandmentions,
    },

    mixins: [vizMixin],

    data() {
        return {
            humanformat: HumanFormat,
            numeral: numeral,
            moment: moment,
        }
    },

    methods: {
        onOpen(item) {
            this.$emit('open', item)
        },
    }
}
</script>

<style lang="scss">
    .items {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-gap: 25px;

        .item {
            padding: 5px;
            cursor: pointer;

            .name {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-bottom: 15px;

                .main-avatar {
                    border-radius: 50%;
                    overflow: hidden;
                    width: 40px;
                    height: 40px;

                    .img {
                        object-fit: contain;
                        width: 100%;
                        height: 100%;
                    }
                }

                
                .followers {
                    font-size: 14px;
                    color: #999;
                }

                .nickname {
                    margin-right: auto;
                    color: #52b141;
                }

                .more {
                    transform: rotate(90deg);
                    display: block;
                }

                .intro {
                    margin-right: auto;
                    margin-left: 15px;
                    border: none;
                }
            }

            .image {
                width: 100%;
                height: 300px;
                position: relative;

                .post {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }
                
                .sponsor {
                    position: absolute;
                    left: 10px;
                    top: 10px;
                }

                .social {
                    position: absolute;
                    border-radius: 100% 0 0;
                    width: 40px;
                    height: 40px;
                    overflow: hidden;
                    background: #52b141;
                    color: #fff;
                    bottom: 0;
                    right: 0;

                    .lni {
                        position: absolute;
                        bottom: 8px;
                        right: 8px;
                    }

                    svg {
                        width: 18px;
                        position: absolute;
                        right: 8px;
                    }
                }
            }

            .info {
                font-size: 14px;
                color: #999;
                padding: 5px 0;
            }

            .description {
                color: #545454;
                font-size: 14px;
            }
        }
    }
</style>
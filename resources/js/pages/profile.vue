<template>
    <!-- row -->
    <div class="container-fluid">
        <div class="card card-body" v-if="item.attributes">
            <div class="row">
                <div class="col-lg-2 col-md-12 col-12 text-center">
                    <img :src="item.attributes.avatar_url" class="img-fluid rounded-circle" alt="">
                </div>
                <div class="col-lg-8 col-md-9 col-12">
                    <h3 class="my-3 text-center text-lg-left" >{{ item.attributes.name }}</h3>
                    <div class="comunities mb-2">
                        <span 
                            class="community badge bg-success text-white mb-1 mr-1" 
                            v-for="(comm, index) in unique(item.overview.communities)" 
                            :key="index">
                            {{ comm }}
                        </span>
                    </div>
                    <p class="bio mb-2" v-if="item.attributes.bio">
                        {{ item.attributes.bio }}
                    </p>
                    <div class="address">
                        <i class="lni lni-map-marker"></i>
                        <b>{{ getCountry(item) }}<span v-if="getCountry(item) && getCity(item)">, </span>{{ getCity(item) }}</b>
                        &nbsp;
                        <span v-if="getLocation(item)">
                            <i class="lni lni-compass"></i>
                            <b>{{ getLocation(item) }}</b>
                        </span>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <socials-graph :dataset="socials"  />
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 align-self-start">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-statistics">
                            <div class="text-center">
                                <div class="row">
                                    <div class="col" >
                                        <h3 class="m-b-0" v-if="item.metrics && item.metrics.followers">
                                            {{ humanformat(item.metrics.followers) }}
                                        </h3>
                                        <span>Follower</span>
                                    </div>
                                    <div class="col" >
                                        <h3 class="m-b-0" v-if="item.metrics && item.metrics.sponsored_rate">
                                            {{  (item.metrics.sponsored_rate * 100).toFixed(2) }} %
                                        </h3>
                                        <h3 v-else>0.00 %</h3>
                                        <span>Sponsored</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0" v-if="item.overview && item.overview.discovered_demographics">
                                            {{ 100 - item.overview.discovered_demographics.average_fake_followers }} %
                                        </h3>
                                        <h3 v-else>
                                            -
                                        </h3>
                                        <span>AUDIENCE AUTHENTICITY</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="profile-tab">
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="#overview" data-toggle="tab" class="nav-link  active show">Overview</a>
                                    </li>
                                    <li class="nav-item"><a href="#connections" data-toggle="tab" class="nav-link">Connections</a>
                                    </li>
                                    <li class="nav-item"><a href="#about" data-toggle="tab" class="nav-link">About</a>
                                    </li>
                                    <li class="nav-item"><a href="#audience" data-toggle="tab" class="nav-link ">Audience</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="overview" class="tab-pane fade  active show">
                                        <recent-content :item="item" />
                                        <hr />
                                        <connections :item="item" />
                                        <hr />
                                        <about :item="item" />
                                        <hr />
                                        <audience :item="item" />
                                    </div>
                                    <div id="connections" class="tab-pane fade">
                                        <connections :item="item" />
                                    </div>
                                    <div id="about" class="tab-pane fade">
                                        <contact :item="item" />
                                        <hr />
                                        <bio :item="item" />
                                        <hr />
                                        <about :item="item" />
                                        <hr />
                                        <tags :item="item" />
                                        <hr />
                                        <communities-tags :item="item" />
                                    </div>
                                    <div id="audience" class="tab-pane fade ">
                                        <audience :item="item" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="preloader">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
        </div>
    </div>			
</template>

<script>
import SocialsGraph from '../components/socials-graph.vue'
import ProfileAudience from '../components/profile-audience.vue'
import Connections from '../components/connections.vue'
import About from '../components/about.vue'
import Audience from '../components/audience.vue'
import RecentContent from '../components/recent-content.vue'
import Bio from '../components/bio.vue'
import Contact from '../components/contact.vue'
import Tags from '../components/tags.vue'
import CommunitiesTags from '../components/communities-tags.vue'
import { mapActions, mapState } from 'vuex'
import requestMixin from '../mixins/requestMixin';
import HumanFormat from  'human-format';
import lodash from 'lodash';

export default {
    name: 'Profile',

    components: {
        SocialsGraph,
        ProfileAudience,
        Connections,
        About,
        Audience,
        RecentContent,
        Bio,
        Contact,
        Tags,
        CommunitiesTags
    },

    mixins: [
        requestMixin,
    ],

    data() {
        return {
            humanformat: HumanFormat,
            socials: [],
            lodash: lodash,
        }
    },

    created() {
        this.fetchData();
    },

    methods: {
        ...mapActions("unity", ['setItem']),
        unique(items) {
            let unique = [];
            items.forEach(item => {
                if ( ! unique.includes(item.value)) {
                    unique = [
                        ...unique,
                        item.value
                    ]
                }
            })
            return unique;
        },
        setSocialGraph() {
            const allowList = ['Facebook', 'Twitter', 'Pinterest', 'Instagram', 'Blog'];
            if (this.item && this.item.connections) {
                this.item.connections.forEach(conn => {
                    const name = conn.attributes
                        .chart_publishable_type
                        .replace('Property', '')
                        .replace('WithProfileReach', '');
    
                        if (allowList.includes(name)) {
                            this.socials = [
                                ...this.socials,
                                {
                                    Name: name,
                                    Count: conn.attributes.reach
                                },
                            ]
                        }
                });
            }
        },
        getCountry(item) {
            return item.overview && item.overview.country ? item.overview.country : '';
        },
        getCity(item) {
            if (item.overview && item.overview.city) {
                return item.overview.city
            }

            if (item.overview && item.overview.discovered_demographics && item.overview.discovered_demographics.city) {
                return item.overview.discovered_demographics.city[0]
            }

            return '';
        },
        getLocation(item) {
            if (item.overview && item.overview.discovered_demographics && item.overview.discovered_demographics.location) {
                return item.overview.discovered_demographics.location[0]
            }

            return '';
        },
        getMetricsConnection(connections) {
            return new Promise((resolve, reject) => {
                connections = connections.map(async (conn) => {
                    const { data } = await this.getConnection(conn.id);
                    return {
                        ...conn,
                        metrics: data.attributes,
                    }
                });

                Promise.all(connections).then((items) => {
                    resolve(items);
                });
            });
        },
        async fetchData() {
            const unit_id = this.$route.params.id
            let { data } = await fetch(`/api/v1/unity/get?unit_id=${unit_id}`).then(r => r.json());
            let metrics = await this.getMetric(data.id);
            let contacts = await this.getContacts(data.id);
            let overview = await this.getOverview(data.id);
            let connections = await this.getConnectionPreperety(data.id);
            let organization = await this.getWhiteLabelOrganizations();
            let audience = await this.getAudienceAccount(data.id);
            connections = await this.getMetricsConnection(connections.data);

            data = {
                ...data,
                metrics: metrics.data.attributes,
                contacts: contacts.data.attributes,
                overview: overview.data.attributes,
                audience: audience.data.attributes,
                organization: organization.data,
                connections,
            }

            this.setItem(data)
            this.stopLoader();
            this.setSocialGraph();
        },

        stopLoader() {
            const el = document.getElementById('preloader')
            el.style.display = 'none'
            el.style['z-index'] = 0;
        }
    },

    computed: {
        ...mapState("unity", ['item']),
    },
}
</script>

<style lang="scss" scoped>
    .profile-photo {
        max-width: 100px;
        max-height: 100px;

        img {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    }

    .cover-photo {
        background-size: cover;
    }

    .community {
        text-transform: capitalize;
    }

    #preloader {
    position: fixed;
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    background-color: #fff; 
    }
</style>
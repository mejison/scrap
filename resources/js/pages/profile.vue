<template>
    <!-- row -->
    <div class="container-fluid">

        <div class="card card-body">
            <div class="row">
                <div class="col-lg-2 col-md-12 col-12 text-center">
                    <img src="https://via.placeholder.com/150x150" :src2="getImages(item)" class="img-fluid rounded-circle" alt="">
                </div>
                <div class="col-lg-8 col-md-9 col-12">
                    <h3 class="my-3 text-center text-lg-left">{{ item.Name }}</h3>
                    <div class="comunities mb-2">
                        <span class="badge bg-success text-white mr-2 mt-2" v-for="(conn, index) in item.Community.split(',')" :key="index">{{ conn }}</span>
                    </div>
                    <p class="bio mb-2" v-if="item.Bio">
                        {{ item.Bio}}
                    </p>
                    <div class="address">
                        <i class="lni lni-map-marker"></i>
                        <b>{{ item.Location }}</b>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-12">
                    <socials-graph :item="item"  />
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
                                    <div class="col">
                                        <h3 class="m-b-0">{{ item.Followers }}</h3><span>Follower</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">{{ item.Sponsored }}</h3><span>Sponsored</span>
                                    </div>
                                    <div class="col">
                                        <h3 class="m-b-0">{{ item['AUDIENCE AUTHENTICITY'] }}</h3><span>AUDIENCE AUTHENTICITY</span>
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
import Communities from './discovery/communities.vue'
import Tags from '../components/tags.vue'
import CommunitiesTags from '../components/communities-tags.vue'

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
        Communities,
        Tags,
        CommunitiesTags
    },

    data() {
        return {
            item: {},
        }
    },

    created() {
        this.fetchData();
    },

    methods: {
        async fetchData() {
            let data = await fetch("/storage/data/stmlnportal.com.json").then(r => r.json());
            this.item = data.find(item => {
                let id =  0;
                if (item.Link) {
                    id = item.Link.split('/').reverse().shift()
                }
                return id == this.$route.params.id
            })
        },
        getImages(item) {
           return []; // return item && item.Images ? item.Images.split(',') : [];
        },
    },
}
</script>

<style lang="scss">
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
</style>
<template>
    <div class="campaign-audio col-md-12">
        <div 
            class="compaign-row align-items-center p-sm-4 p-3 row sp16 mx-0 mb-2"
            v-for="(item, index) in items"
            :key="index"
            >
            <div class="col-lg-2 col-md-4">
                <div class="text-center">
                    <img :src="getImages(item)[0]" class="img-thumbnail" alt="...">
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <h3>{{ item.Name }}</h3>
                <div class="communities">
                    <span class="community badge bg-success text-white mb-1 mr-1" v-for="(comm, index) in getCommunities(item)" :key="index">
                        {{ comm }}
                    </span>
                </div>
                <div class="location">
                    <span>
                       <i class="lni lni-map-marker"></i>
                        {{ item.Location }}
                    </span>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="row">
                    <div class="col-6">
                        <ul>
                            <li>
                                <b>FOLLOWERS</b>
                                <br />
                                {{ item.Followers }}
                            </li>
                            <li>
                                <b>SPONSORED</b>
                                <br />
                                {{ item.Sponsored }}
                            </li>
                            <li>
                                <b>ENG. RATE</b>
                                <br />
                                —
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <div>
                                 <a :href="item.Instagram" target="_blank">
                                    <i class="lni lni-instagram-original"></i> Instagram
                                </a>
                            </div>
                            <div>
                                 <a :href="item.Facebook" target="_blank">
                                    <i class="lni lni-facebook-original"></i> Facebook
                                </a>
                            </div>
                            <div>
                                 <a :href="item.Twitter" target="_blank">
                                    <i class="lni lni-twitter-original"></i> Twitter
                                </a>
                            </div>
                            <div>
                                 <a :href="item.Pinterest" target="_blank">
                                    <i class="lni lni-pinterest"></i> Pinterest
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="rates mb-3">
                    <b>Rates</b>
                    <div class="range">
                        {{ item.Rates }}
                    </div>
                </div>
                <a href="#" class="btn btn-sm btn-primary" @click.prevent="onClickView(item)">
                    View Profile
                </a>
            </div>
        </div>
        <div v-if=" ! items.length" class="alert alert-warning" role="alert">
            Nothing was found for this query!
        </div>
    </div>
</template>

<script>
export default {
    name: 'Search',

    props: {
        items: {
            type: Array,
            default: [],
        },
    },

    data() {
        return {

        }
    },

    methods: {
        onClickView(item) {
            const id = item.Link.split('/').reverse().shift()
            this.$router.push(`/search/profile/${id}`);
        },
        getImages(item) {
            return item.Images ? item.Images.split(',') : [];
        },
        getCommunities(item) {
            const communities = item.Community ? item.Community.split(',') : [];
            return communities;
        },
    }
}
</script>

<style lang="scss">
    
</style>
<template>
    <div class="campaign-audio col-md-12">
        <div 
            class="compaign-row align-items-center p-sm-4 p-3 row sp16 mx-0 mb-2"
            v-for="(item, index) in items"
            :key="index"
            >
            <div class="col-lg-2 col-md-4">
                <div class="text-center default_avatar">
                    <img :src="item.attributes.default_avatar_url" class="img-thumbnail" alt="...">
                    <span v-if="item.attributes.is_celebrity" class="badge text-white bg-warning text-uppercase celeb">celeb</span>
                    <span v-if="item.attributes.is_pro" class="badge text-white bg-danger text-uppercase pro">pro</span>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <h3>{{ item.attributes.name }}</h3>
                <div class="communities">
                    <span class="community badge bg-success text-white mb-1 mr-1" v-for="(comm, index) in item.attributes.communities" :key="index">
                        {{ comm.value }}
                    </span>
                </div>
                <div class="location">
                    <span>
                       <i class="lni lni-map-marker"></i>
                        {{ item.attributes.country }} <span v-if="item.attributes.city">, {{ item.attributes.city }}</span>
                    </span>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="row">
                    <div class="col-6">
                        <ul>
                            <li v-if="item.metrics && item.metrics.followers">
                                <b>FOLLOWERS</b>
                                <br />
                                {{ humanformat(item.metrics.followers) }}
                            </li>
                            <li>
                                <b>SPONSORED</b>
                                <br />
                                <div v-if="item.metrics && item.metrics.sponsored_rate">
                                    {{  (item.metrics.sponsored_rate * 100).toFixed(2) }} %
                                </div>
                                <div v-else>
                                    0.00 %
                                </div>
                            </li>
                            <li>
                                <b>ENG. RATE</b>
                                <br />
                                <div v-if="item.metrics && item.metrics.eng_rate">
                                    {{ (item.metrics.eng_rate * 100).toFixed(2)  }} %
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6">
                        <div class="d-flex flex-column">
                            <buble-socials-graph :item="item"></buble-socials-graph>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4">
                <div class="rates mb-3">
                    <b>Rates</b>
                    <div class="range">
                        ${{ numeral(getRate(item)).format('0,0') }} - ${{ numeral(getRate(item, false)).format('0,0') }}
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
import HumanFormat from  'human-format';
import BubleSocialsGraph from '../components/buble-socials-graph.vue';
import numeral from 'numeral';

export default {
    name: 'Search',

    components: {
        BubleSocialsGraph
    },

    props: {
        items: {
            type: Array,
            default: [],
        },
    },

    data() {
        return {
            humanformat: HumanFormat,
            numeral: numeral,
        }
    },

    methods: {
        getRate(item, isMin = true) {
            if (item.rates) {
                let items = [];
                item.rates.forEach(item => {
                    items = [
                        ...items,
                        item.attributes.estimated_asking_price_in_cents ? (item.attributes.estimated_asking_price_in_cents / 100).toFixed(0) :
                        (item.attributes.asking_price_in_cents / 100).toFixed(0) 
                    ]
                });

                items = items.sort(function(a, b) {
                    return a - b;
                });

                return isMin ? items[0] : items[items.length - 1]
            }
          return 0;
        },
        onClickView(item) {
            const id = item.id
            this.$router.push(`/#/profile/${id}`);
        },
        getImages(item) {
            return item.Images ? item.Images.split(',') : [];
        },
    }
}
</script>

<style lang="scss">
    .default_avatar {
        position: relative;

        .pro, .celeb {
            position: absolute;
            top: 10px;
            left: 10px;
        }
        
    }
</style>
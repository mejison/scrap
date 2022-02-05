<template>
    <div class="connections" >
       <h3 class="my-4" v-if="item.connections">
            {{ item.connections.length }} Connections
       </h3>
       <div class="row" v-if="item.connections">
           <div class="col-lg-4 col-12" v-for="(connect, index) in item.connections" :key="index">
               <div class="card">
                   <div class="card-header">
                       <div class="row">
                           <div class="col-4">
                               <div class="text-center connection">
                                   <div>
                                       <img width="64" height="64" :src="connect.attributes.avatar_url"
                                        class="rounded-circle" alt="" />
                                   </div>
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
                           </div>
                           <div class="col-8" >
                               <div>
                                   <h4>{{ connect.attributes.connection_name }}</h4>
                                    <a :href="connect.attributes.property_url" target="_blank" class="text-muted">
                                        <small class="text-primary">
                                            View On {{ connect.attributes.chart_publishable_type.replace('Property', '').replace('WithProfileReach', '') }} <i class="lni lni-link"></i>
                                        </small>
                                    </a>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="card-body">
                       <ul>
                           <li class="text-muted mb-2">
                              <i class="lni lni-users"></i> 
                              <span v-if="connect.metrics && connect.metrics.followers">{{ humanformat(connect.metrics.followers) }}</span>
                              <span v-else>0</span>
                               Followers
                           </li>
                           <li class="text-muted mb-2">
                               <i class="lni lni-bullhorn"></i>
                                <span v-if="connect.metrics && connect.metrics.sponsored_rate">{{  (connect.metrics.sponsored_rate * 100).toFixed(2) }} %</span><span v-else>0.00 %</span><span>Sponsored</span>
                           </li>
                           <li class="text-muted">
                               <i class="lni lni-pulse"></i> <span v-if="connect.metrics && connect.metrics.eng_rate">{{  (connect.metrics.eng_rate * 100).toFixed(2) }} %</span> <span v-else>0.00 %</span>
                                Eng. Rate By Followers
                           </li>
                       </ul>
                   </div>
                   <div class="card-footer d-flex justrify-content-bwteeen">
                       <span class="badge bg-primary text-white text-uppercase">authorized</span>
                        <span class="ml-auto">${{ numeral(getPrice(connect.attributes)).format('0,0') }}</span>
                   </div>
               </div>
           </div>
       </div>
    </div>
</template>

<script>
import requestMixin from '../mixins/requestMixin';
import HumanFormat from  'human-format';
import numeral from 'numeral';

export default {
    name: 'Connections',

    props: {
        item: {
            type: Object,
            default: () => ({}),
        }
    },

    mixins: [
        requestMixin,
    ],

    data() {
        return {
            humanformat: HumanFormat,
            numeral: numeral,
        }
    },

    methods: {
        getPrice(conn) {
            return  conn.estimated_asking_price_in_cents ? (conn.estimated_asking_price_in_cents / 100).toFixed(0) :
                        (conn.asking_price_in_cents / 100).toFixed(0);
        },
    },
}
</script>

<style lang="scss" scoped>
    .connection {
        position: relative;    

        .social {
            position: absolute;
            bottom: -5px;
            right: -15px;
            border: 1px solid #999;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }
</style>
<template>
    <div class="connections" v-if="item.relationships && item.relationships.official_connections">
       <h3 class="my-4">
            {{ item.relationships.official_connections.data.length }} Connections
       </h3>
       <div class="row">
           <div class="col-lg-4 col-12" v-for="(connect, index) in item.relationships.official_connections.data" :key="index">
               <div class="card">
                   <div class="card-header">
                       <div class="row">
                           <div class="col-4">
                               <div class="text-center connection">
                                   <img src="https://via.placeholder.com/64x64"
                                   class="rounded-circle" alt="" />
                                   <span class="social">
                                       <i v-if="['instagram'].includes(connect.type)" class="lni lni-instagram"></i>
                                       <i v-if="['facebook'].includes(connect.type)" class="lni lni-facebook"></i>  
                                       <i v-if="['twitter'].includes(connect.type)" class="lni lni-twitter"></i>  
                                       <i v-if="['website'].includes(connect.type)" class="lni lni-website"></i>  
                                    </span>
                               </div>
                           </div>
                           <div class="col-8">
                               <div class="">
                                   <h3>{{ item.attributes.name }}</h3>
                                    <a href="#" class="text-muted">
                                        <small class="text-primary">
                                            View On {{ connect.name }} <i class="lni lni-link"></i>
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
                              <span v-if="connections[connect.id]">{{ humanformat(connections[connect.id].followers) }}</span>
                              <span v-else>0</span>
                               Followers
                           </li>
                           <li class="text-muted mb-2">
                               <i class="lni lni-bullhorn"></i>
                                <span v-if="connections[connect.id] && connections[connect.id].sponsored_rate">{{  (connections[connect.id].sponsored_rate * 100).toFixed(2) }} %</span><span v-else>0.00 %</span><span>Sponsored</span>
                           </li>
                           <li class="text-muted">
                               <i class="lni lni-pulse"></i> <span v-if="connections[connect.id] && connections[connect.id].eng_rate">{{  (connections[connect.id].eng_rate * 100).toFixed(2) }} %</span> <span v-else>0.00 %</span>
                                Eng. Rate By Followers
                           </li>
                       </ul>
                   </div>
                   <div class="card-footer d-flex justrify-content-bwteeen">
                       <span class="badge bg-primary text-white text-uppercase">authorized</span>
                        <span class="ml-auto">$0</span>
                   </div>
               </div>
           </div>
       </div>
    </div>
</template>

<script>
import requestMixin from '../mixins/requestMixin';
import HumanFormat from  'human-format';

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
            connections: {},
        }
    },

    watch: {
        item() {
            if ( this.item && this.item.relationships) {
                const connections = this.item.relationships.official_connections.data;
                connections.map(async (conn) => {
                    const { data } = await this.getConnection(conn.id);
                    this.connections[data.id] = data.attributes;
                    this.connections = {...this.connections}
                })
            }
            //getConnection
        }
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
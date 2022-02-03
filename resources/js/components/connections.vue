<template>
    <div class="connections">
       <h3 class="my-4">
            {{ connections.length }} Connections
       </h3>
       <div class="row">
           <div class="col-lg-4 col-12" v-for="(connect, index) in connections" :key="index">
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
                                   <h3>jojotastic</h3>
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
                              <i class="lni lni-users"></i> 3.4K Followers
                           </li>
                           <li class="text-muted mb-2">
                               <i class="lni lni-bullhorn"></i> 17.76 Sponsored
                           </li>
                           <li class="text-muted">
                               <i class="lni lni-pulse"></i> 1.34% Eng. Rate By Followers
                           </li>
                       </ul>
                   </div>
                   <div class="card-footer d-flex justrify-content-bwteeen">
                       <span class="badge bg-primary text-white text-uppercase">authorized</span>
                        <span class="ml-auto">$327</span>
                   </div>
               </div>
           </div>
       </div>
    </div>
</template>

<script>
export default {
    name: 'Connections',

    props: {
        item: {
            type: Object,
            default: () => ({}),
        }
    },

    data() {
        return {
            connections: [
                {
                    name: 'Facebook',
                    type: 'facebook',
                    url: '',
                },
                {
                    name: 'Instagram',
                    type: 'instagram',
                    url: '',
                },
                {
                    name: 'Website',
                    type: 'website',
                    url: '',
                }
            ]
        }
    }
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
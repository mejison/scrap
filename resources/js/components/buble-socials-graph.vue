<template>
    <div>
        <ul>
             <li v-for="(rate, index) in item.rates" :key="index">
                 <a :href="rate.attributes.property_url" target="_blank">
                    <i class="lni lni-blogger" v-if="rate.attributes.publishable_type == 'BlogProperty'"></i> 
                    <i class="lni lni-facebook" v-if="rate.attributes.publishable_type == 'FacebookProperty'"></i> 
                    <i class="lni lni-instagram" v-if="rate.attributes.publishable_type == 'InstagramProperty'"></i> 
                    <i class="lni lni-pinterest" v-if="rate.attributes.publishable_type == 'PinterestProperty'"></i> 
                    <i class="lni lni-twitch" v-if="rate.attributes.publishable_type == 'TwitchProperty'"></i> 
                    <i class="lni lni-wordpress" v-if="rate.attributes.publishable_type == 'WordpressProperty'"></i> 
                    <i class="lni lni-youtube" v-if="rate.attributes.publishable_type == 'YoutubeProperty'"></i> 
                    <i class="lni lni-twitter"  v-if="rate.attributes.publishable_type == 'TwitterProperty'"></i>
                    {{ humanformat(rate.attributes.reach) }}
                 </a>
            </li>
            <!-- <li v-if="item.attributes.reach.blog">
                <i class="lni lni-blog" ></i> {{ humanformat(item.attributes.reach.blog) }}
            </li>
            <li v-if="item.attributes.reach.facebook">
                <i class="lni lni-facebook" ></i>  {{ humanformat(item.attributes.reach.facebook) }}
            </li>
             <li v-if="item.attributes.reach.instagram">
                <i class="lni lni-instagram" ></i>  {{ humanformat(item.attributes.reach.instagram) }}
            </li>
             <li  v-if="item.attributes.reach.pinterest">
                <i class="lni lni-pinterest"></i>  {{ humanformat(item.attributes.reach.pinterest) }}
            </li>
             <li v-if="item.attributes.reach.twitch">
                <i class="lni lni-twitch" ></i>  {{ humanformat(item.attributes.reach.twitch) }}
            </li>
            <li  v-if="item.attributes.reach.twitter">
                <i class="lni lni-twitter"></i>  {{ humanformat(item.attributes.reach.twitter) }}
            </li>
            <li v-if="item.attributes.reach.wordpress">
                <i class="lni lni-wordpress" ></i>  {{ humanformat(item.attributes.reach.wordpress) }}
            </li>
            <li v-if="item.attributes.reach.youtube">
                <i class="lni lni-youtube" ></i> {{ humanformat(item.attributes.reach.youtube) }}
            </li> -->
        </ul>
    </div>
</template>

<script>
import HumanFormat from  'human-format';

export default {
   props: {
       item: {
           type: Object,
           default: () => ({})
       },
   },

   data() { 
       return {
        humanformat: HumanFormat
       }
   },
}

</script>
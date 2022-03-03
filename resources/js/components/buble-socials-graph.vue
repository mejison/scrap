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
                    {{ humanformat(rate.attributes.reach ? rate.attributes.reach : 0) }}
                 </a>
            </li>
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
<template>
    <div>
        <ul>
            <li v-if="item.attributes.reach.blog">
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
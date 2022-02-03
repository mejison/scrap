<template>
    <div>
        <a href="#">
            <h3 class="page-title my-4">Recent Content &nbsp;<small class="text-muted"><i class="lni lni-instagram-original"></i> {{ getInstagram(item) }} <i class="lni lni-arrow-down"></i></small></h3>
        </a>
             <div class="row">
                <div 
                    class="col-3" 
                    v-for="(image, index) in getImages(item)" 
                    :key="index">
                        <img 
                            src="https://via.placeholder.com/250x250" 
                            class="img-thumbnail"
                            alt=""
                        />
                </div>
            </div>
    </div>
</template>

<script>
export default {
    name: 'RecentContent',

    props: {
        item: {
            type: Object,
            default: () => ({}),
        }
    },

    methods: {
        getInstagram(item) {
            return item.Instagram.replace("http://instagram.com/", "")
        },
        getImages(item) {
           return item && item.Images ? item.Images.split(',').slice(0, 4) : [];
        },
    }
}
</script>
<template>
    <div class="row">
        <div 
            class="col-lg-4 col-md-6 col-12 mb-4 community" 
            v-for="(community, index) in communities" 
            :key="index"
            @click.prevent="onSelect(community)"
            >
            <div class="image">
                <img class="img-thumbnail" :src="community.img" alt="community" />
            </div>
            <h3 class="text-black font-w600 my-3">{{ community.name }}</h3>
        </div>
    </div>
</template>

<script>
export default {
    name: '',

    data() {
        return {
            communities: [
                {
                    name: 'Beauty',
                    img: 'https://stmlnportal.com/communities/new/beauty.jpg',
                },
                {
                    name: 'DIY / Craft',
                    img: 'https://stmlnportal.com/communities/new/diy.jpg',
                },
                {
                    name: 'Family',
                    img: 'https://stmlnportal.com/communities/new/family.jpg',
                },
                {
                    name: 'Celebrity',
                    img: 'https://stmlnportal.com/communities/new/celebrity.jpg',
                },
                {
                    name: 'Fashion',
                    img: 'https://stmlnportal.com/communities/new/fashion.jpg',
                },
                {
                    name: 'Food',
                    img: 'https://stmlnportal.com/communities/new/food.jpg',
                },
                {
                    name: 'Health',
                    img: 'https://stmlnportal.com/communities/new/health.jpg',
                },
                {
                    name: 'Business',
                    img: 'https://stmlnportal.com/communities/new/business.jpg',
                },
                {
                    name: 'Entertainment',
                    img: 'https://stmlnportal.com/communities/new/entertainment.jpg',
                },
                {
                    name: 'Music',
                    img: 'https://stmlnportal.com/communities/new/music.jpg',
                },
                {
                    name: 'Pop Culture',
                    img: 'https://stmlnportal.com/communities/new/pop_culture.jpg',
                },
                {
                    name: 'Sports',
                    img: 'https://stmlnportal.com/communities/new/sports.jpg',
                },
                {
                    name: 'Technology',
                    img: 'https://stmlnportal.com/communities/new/technology.jpg',
                },
                {
                    name: 'Travel',
                    img: 'https://stmlnportal.com/communities/new/travel.jpg',
                },
                {
                    name: 'Video Games',
                    img: 'https://stmlnportal.com/communities/new/video_games.jpg',
                },
            ],
        }
    },

    methods: {
        onSelect(community) {
            this.$emit('selected-community', community)
        },
    },
}
</script>

<style lang="scss">
    .community {
        cursor: pointer;

        .image {
            overflow: hidden;

            img {
                object-fit: cover;
                object-position: top;
                width: 100%;
                max-height: 300px;
                height: 100%;    
            }
        }
    }
</style>
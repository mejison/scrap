<template>
    <div class="socials">
        <span class="social big instagram">
            <a :href="item.Instagram"  target="_blank">
                <i class="lni lni-instagram"></i>
            </a>
        </span>
        <span class="social facebook">
            <a :href="item.Facebook"  target="_blank">
                <i class="lni lni-facebook"></i>
            </a>
        </span>
        <span class="social twitter">
            <a :href="item.Twitter" target="_blank">
                <i class="lni lni-twitter"></i>
            </a>
        </span>
        <span class="social youtube">
            <a :href="item.Youtube"  target="_blank">
                <i class="lni lni-youtube"></i>
            </a>
        </span>
         <span class="social pinterest">
            <a :href="item.Pinterest"  target="_blank">
                <i class="lni lni-pinterest"></i>
            </a>
        </span>
    </div>
</template>

<script>
export default {
    name: 'SocialGraphs',

    props: {
        item: {
            type: Object,
            default: () => ({}),  
        },
    },

    data() {
        return {

        }
    },
}
</script>

<style lang="scss" scoped>
    .socials {
        width: 130px;
        height: 130px;
        position: relative;
    }

    .social {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 1px solid #999; 
        margin: 0;
        position: absolute;
        top: 0;
        left: 0;

        &.instagram {
            width: 80px;
            height: 80px;
            font-size: 25px;
            top: 50%;
            transform: translateY(-50%);
            left: 40px;
        }

        &.facebook {
            top: 0px;
            left: 25px;
        }

        &.youtube {
            top: 30px;
        }

        &.pinterest {
            top: 70px;
        }

        &.twitter {
            top: 100px;
            left: 25px;
        }
    }
</style>
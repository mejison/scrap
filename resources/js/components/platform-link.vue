<template>
    <div class="link-social mb-3">
        <a 
            :href="`https://www.instagram.com/p/${item.attributes.platform_content_id}`" 
            target="_blank"
            v-if="['instagram'].includes(item.attributes.platform)"
        >https://www.instagram.com/p/{{ item.attributes.platform_content_id }}</a>
        <a 
            :href="`https://www.youtube.com/watch?v=${item.attributes.platform_content_id}`" 
            target="_blank"
            v-if="['youtube'].includes(item.attributes.platform)"
        >https://www.youtube.com/watch?v={{ item.attributes.platform_content_id }}</a>
        <a 
            :href="`https://www.pinterest.com/pin/${item.attributes.platform_content_id}`" 
            target="_blank"
            v-if="['pinterest'].includes(item.attributes.platform)"
        >https://www.pinterest.com/pin/{{ item.attributes.platform_content_id }}</a>
        <a 
            :href="`https://www.tiktok.com/@${item.attributes.connection_id}/video/${item.attributes.platform_content_id}`" 
            target="_blank"
            v-if="['tiktok'].includes(item.attributes.platform)"
        >https://www.tiktok.com/@{{ item.attributes.connection_id }}/video/{{ item.attributes.platform_content_id }}</a>
    </div>
</template>

<script>
export default {
    name: "PlatformLink",

    props: {
        item: {
            type: Object,
            default: () => ({}),
        },
    },
}
</script>

<style lang="scss" scoped>
    .link-social {
        a {
            color: #4C68C7;
            font-size: 14px;
        }
    }
</style>
<template>
    <div class="contact">
        <h3 class="page-title my-4">Bio</h3>
        <p v-if="item && item.attributes">
            {{ item.attributes.bio ? item.attributes.bio : '--' }}
        </p>
    </div>
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            default: () => ({}),
        }
    },
}
</script>
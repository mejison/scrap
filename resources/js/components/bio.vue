<template>
    <div class="contact">
        <h3 class="page-title my-4">Bio</h3>
        <p>
            {{ item.Bio ? item.Bio : '--' }}
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
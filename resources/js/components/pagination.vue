<template>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link btn" @click.prevent="onClickPrev" :class="{'disabled': ! canPrev}" href="#" :disabled=" ! canPrev">Previous</a>
            </li>
            <li class="page-item ml-2">
                <a class="page-link btn" @click.prevent="onClickNext" href="#" :class="{'disabled': ! canNext}" :disabled="canNext" >Next</a>
            </li>
        </ul>
    </nav>
</template>

<script>
import { mapState } from 'vuex';
export default {
    name: 'pagination',


    props: {
        current: {
            type: Number,
            default: 1,
        },
    },

    methods: {
        onClickNext() {
            this.$emit('next');
        },
        onClickPrev() {
            this.$emit('prev');
        },
    },

    computed: {
        ...mapState("unity", ['items']),
        canPrev() {
            return this.current != 1
        },
        canNext() {
            return this.items.length == 10;
        },
    },
}
</script>

<style lang="scss">
    .disabled {

    }
</style>
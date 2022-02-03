<template>
    <div class="audience">
        <h3 class="my-4">Audience</h3>
        <div class="row">
            <div class="col-lg-6 col-12">
                <insights-graph :item="item" />
            </div>
            <div class="col-lg-6 col-12">
                <gender-graph :item="item" />
            </div>
        </div>
    </div>
</template>

<script>
import InsightsGraph from '../components/insights-graph.vue'
import GenderGraph from '../components/gender-graph.vue'

export default {
    components: {
        InsightsGraph,
        GenderGraph,
    },

    props: {
        item: {
            type: Object,
            default: () => ({}),
        },
    },
}
</script>
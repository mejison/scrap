<template>
    <div class="audience">
        <h3 class="my-4">Audience</h3>
        <div class="row">
            <!-- <div class="col-lg-6 col-12">
                <insights-graph v-if="item.audience && item.audience['top-engagement-insights']" :data="item.audience['top-engagement-insights']" />
            </div> -->
            <div class="col-lg-6 col-12"  v-if="item.audience && item.audience.genders">
                <gender-graph v-if="item.audience && item.audience.genders" :data="item.audience.genders" />
            </div>
            <div class="col-lg-6 col-12" v-if="item.audience && item.audience['age-ranges'] && item.audience['age-ranges'].length">
                <age-graph  :data="item.audience['age-ranges']" />
            </div>
            <div class="col-lg-6 col-12" v-if="item.audience && item.audience['top-us-states'] && item.audience['top-us-states'].length">
                <state-graph  :data="item.audience['top-us-states']" />
            </div>
            <div class="col-lg-6 col-12" v-if="item.audience && item.audience['top-countries'] && item.audience['top-countries'].length">
                <countries-graph  :data="item.audience['top-countries']" />
            </div>
        </div>
    </div>
</template>

<script>
import InsightsGraph from '../components/insights-graph.vue'
import GenderGraph from '../components/gender-graph.vue'
import AgeGraph from '../components/age-graph.vue'
import StateGraph from '../components/state-graph.vue'
import CountriesGraph from '../components/countries-graph.vue'

export default {
    components: {
        InsightsGraph,
        GenderGraph,
        AgeGraph,
        StateGraph,
        CountriesGraph
    },

    props: {
        item: {
            type: Object,
            default: () => ({}),
        },
    },
}
</script>
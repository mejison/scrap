<template>
    <div>
        <h4 class="my-3 text-center">ENGAGEMENT INSIGHTS</h4>
        <div class="insight-graph card card-body">
            <div class="row mb-3">
                <div class="col-3">
                    <h5 class="f-w-500 text-primary">Insight <span class="pull-right"></span>
                    </h5>
                </div>
                <div class="col-9 text-right text-primary">
                  Eng. Rate (# Posts)
                </div>
            </div>
            <div class="row mb-1" v-for="(item, index) in insights" :key="index">
                <div class="col-3">
                    <h5 class="f-w-500"><small>{{ item.title.toLowerCase() }}</small> <span class="pull-right"></span>
                    </h5>
                </div>
                <div class="col-9 text-right">
                    <small>{{ item.value }}</small>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        item: {
            type: Object,
            default: () => ({}),
        },
    },

    computed: {
        insights() {
            const audience_insights = this.item && this.item['Audience insights'] ? this.item['Audience insights'] : '';
            const items = audience_insights.split(',')
            return items.map(item => {
                let parts = item.trim().split(' ')
                return {
                    title: parts[0],
                    value: parts.slice(1, parts.length).join(' '),
                }
            })
        }
    }
}
</script>
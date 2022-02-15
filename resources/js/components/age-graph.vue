<template>
    <div>
        <h4 class="my-3 text-center">AGE</h4>
        <div class="insight-graph card card-body">
            <!-- <v-chart class="chart" :option="option" /> -->
            <div class="chart" id="chartDom" ref="chartDom"></div>
        </div>
    </div>
</template>

<script>
const echarts = require('echarts');

export default {
    props: {
        data: {
            type: Array,
            default: () => ([]),
        },
    },

    data() {
        return {
            option: {},
        }
    },

    mounted() {
        this.setData();
    },

    methods: {
        setData() {
            let labels = [];
            let data = [];

            this.data.forEach(item => {
                labels = [
                    ...labels,
                    item.name
                ]

                data = [
                    ...data,
                    item.reachValue
                ]
            })

            this.printBar(labels, data);
        },
        formatPercentage(value) {
        return Number(value).toLocaleString(undefined,{style: 'percent', minimumFractionDigits:2});
        },
        printBar(labels, data) {
            const chartDom = this.$refs.chartDom;
            const myChart = echarts.init(chartDom);
           
           const  option = {
                xAxis: {
                    type: 'category',
                    data: labels,
                },
                yAxis: {
                    type: 'value'
                },
                series: [
                    {
                    data: data,
                    type: 'bar',
                    showBackground: true,
                        backgroundStyle: {
                            color: 'rgba(180, 180, 180, 0.2)'
                        }
                    }
                ]
            };

            option && myChart.setOption(option);
        },
    }
}
</script>

<style scoped>
.chart {
  height: 400px;
}
</style>
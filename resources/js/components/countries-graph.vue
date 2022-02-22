<template>
    <div>
        <h4 class="my-3 text-center">TOP COUNTRIES</h4>
        <div class="insight-graph card card-body mb-0">
            <div class="chart" :id="`chartDomCountries-${uniqueId}`" ref="chartDom"></div>
        </div>
    </div>
</template>

<script>
import * as echarts from 'echarts';

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
            uniqueId: '',
        }
    },

    created() {
        this.uniqueId = (new Date()) * 1
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
                    ((item.reachPercentage) * 100).toFixed(0)
                ]
            })

            this.printBar(labels, data);
        },
        printBar(labels, data) {
            var dom = document.getElementById(`chartDomCountries-${this.uniqueId}`);
            var myChart = echarts.init(dom);

            var dataset = [];
            labels.forEach((label, index) => {
                dataset = [
                    ...dataset,
                    [data[index], `${data[index]}% ${label}`]
                ]
            });

            var option = {
                dataset: {
                    source: [
                        ['score', 'product'],
                        ...dataset,
                    ]
                },
                grid: { containLabel: true },
                xAxis: { name: 'amount', show: false },
                yAxis: { type: 'category' },
                series: [
                    {
                    type: 'bar',
                    encode: {
                        x: 'amount',
                        y: 'product'
                    }
                    }
                ]
            };

            if (option && typeof option === 'object') {
                myChart.setOption(option);
            }
        },
    }
}
</script>

<style scoped>
.chart {
  height: 400px;
  width: 400px;
}
</style>
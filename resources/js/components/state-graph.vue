<template>
    <div>
        <h4 class="my-3 text-center">TOP STATES</h4>
        <div class="insight-graph card card-body mb-0">
            <div class="chart" :id="`chartDomState-${uniqueId}`" ref="chartDom"></div>
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
            uniqueId: 0,
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
            var dom = document.getElementById(`chartDomState-${this.uniqueId}`);
            var myChart = echarts.init(dom);
            var app = {};

            app.config = {
                rotate: 90,
                align: 'left',
                verticalAlign: 'center',
                position: 'outside',
                distance: 5,
            };

            const labelOption = {
                show: true,
                position: app.config.position,
                distance: app.config.distance,
                align: app.config.align,
                verticalAlign: app.config.verticalAlign,
                rotate: app.config.rotate,
                formatter: '{c}% {b}',
                fontSize: 12,
                rich: {
                    name: {}
                }
            };

            var option = {
                width: 400,
                height: 400,
                xAxis: [
                    {
                        show: false,
                        axisTick: { show: false },
                        data: labels
                    }
                ],
                yAxis: [
                    {
                        show: false,
                        type: 'value'
                    }
                ],
                series: [
                    {
                        name: 'Forest',
                        type: 'bar',
                        barGap: 0,
                        label: labelOption,
                        emphasis: {
                            focus: 'series'
                        },
                        data: data
                    },
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
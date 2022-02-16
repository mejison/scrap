<template>
    <div>
        <h4 class="my-3 text-center">AGE</h4>
        <div class="insight-graph card card-body">
            <!-- <v-chart class="chart" :option="option" /> -->
            <div class="chart" id="chartDomAge" ref="chartDom"></div>
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
                    ((item.reachPercentage) * 100).toFixed(0)
                ]
            })

            this.printBar(labels, data);
        },
        printBar(labels, data) {
            var dom = document.getElementById("chartDomAge");
            var myChart = echarts.init(dom);
            var app = {};


            app.config = {
                top: 'top',
                middle: 'top',
                bottom: 'top'
            };

            const labelOption = {
                show: true,
                position: app.config.position,
                distance: app.config.distance,
                align: app.config.align,
                verticalAlign: app.config.verticalAlign,
                rotate: app.config.rotate,
                formatter: '{c} %',
                fontSize: 12,
                rich: {
                    name: {}
                }
            };

            var option = {
                xAxis: [
                    {
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
}
</style>
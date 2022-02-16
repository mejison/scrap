<template>
    <div>
        <div id="chart"></div>
    </div>
</template>

<script>
import * as echarts from 'echarts';

export default {
    name: 'TestGraph',

    data() {
        return {
        }
    },

    mounted() {

        var dom = document.getElementById("chart");
        var myChart = echarts.init(dom);
        var app = {};


            app.config = {
            align: 'center',
            verticalAlign: 'top',
            position: 'insideTop',
            };

            const labelOption = {
            show: true,
            position: app.config.position,
            distance: app.config.distance,
            align: app.config.align,
            verticalAlign: app.config.verticalAlign,
            rotate: app.config.rotate,
            formatter: '{c}',
            fontSize: 16,
            rich: {
                name: {}
            }
            };

            var option = {
            xAxis: [
                {
                axisTick: { show: false },
                data: ['2012', '2013', '2014', '2015', '2016']
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
                data: [34]
                },
            ]
            };

            if (option && typeof option === 'object') {
                myChart.setOption(option);
            }

    },

    methods: {

    }
}
</script>

<style lang="scss" scoped>
    #chart {
        height: 400px;
    }
</style>
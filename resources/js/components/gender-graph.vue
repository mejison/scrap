<template>
    <div>
        <h4 class="my-3 text-center">GENDER</h4>
        <div class="insight-graph card card-body">
            <v-chart class="chart" :option="option" />
        </div>
    </div>
</template>

<script>

import { use } from "echarts/core";
import { CanvasRenderer } from "echarts/renderers";
import { PieChart } from "echarts/charts";
import {
  TitleComponent,
  TooltipComponent,
  LegendComponent
} from "echarts/components";
import VChart, { THEME_KEY } from "vue-echarts";

use([
  CanvasRenderer,
  PieChart,
  TitleComponent,
  TooltipComponent,
  LegendComponent
]);


export default {
    components: {
        VChart
    },
    
    provide: {
        [THEME_KEY]: "light"
    },

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

    methods:{
        setData() {
            let famalePercent = 1;
            let malePercent = 1;

            const male = this.data.find(item => ['M'].includes(item.name));
            const famale = this.data.find(item => ['F'].includes(item.name));

            if (male) {
                malePercent = male.reachValue
            }

            if (famale) {
                famalePercent = famale.reachValue
            }

            this.option = {
                tooltip: {
                    trigger: "item",
                    formatter: "{a} <br/>{b} : {c} ({d}%)"
                },
                legend: {
                    orient: "vertical",
                    left: "left",
                    data: [
                        "Male",
                        "Famale",
                    ]
                },
                series: [
                    {
                        name: "Traffic Sources",
                        type: "pie",
                        radius: "55%",
                        center: ["50%", "60%"],
                        data: [
                        { value: malePercent, name: "Male" },
                        { value: famalePercent, name: "Famale" },
                        ],
                        emphasis: {
                        itemStyle: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowColor: "rgba(0, 0, 0, 0.5)"
                        }
                        }
                    }
                ]
            }
        }
    }
}
</script>

<style scoped>
.chart {
  height: 400px;
  width: 400px;
}
</style>
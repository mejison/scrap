<template>
    <div class="socials">
       <div id="graph"></div>
    </div>
</template>

<script>
import humanformat from 'human-format';

export default {
    name: 'SocialGraphs',

    props: {
        item: {
            type: Object,
            default: () => ({}),  
        },
        dataset: {
            default: () => ([]),
            type: Array``,
        }
    },

    data() {
        return {
            humanformat: humanformat,
        }
    },

    watch: {
        dataset() {
            this.print();
        }
    },

    mounted() {
        this.print();
    },

    methods: {
        print() {
            const dataset = {
                "children": [
                    ...this.dataset,
                ]
            };

            var diameter = 150;
            var color = d3.scaleOrdinal(d3.schemeCategory20);

            var bubble = d3.pack(dataset)
                .size([diameter, diameter])
                .padding(1.5);

            var svg = d3.select("#graph")
                .append("svg")
                .attr("width", diameter)
                .attr("height", diameter)
                .attr("class", "bubble");

            var nodes = d3.hierarchy(dataset)
                .sum(function(d) { return d.Count; });

            let descendants = bubble(nodes).descendants()
            var node = svg.selectAll(".node")
                .data(descendants)
                .enter()
                .filter(function(d){
                    return  !d.children
                })
                .append("g")
                .attr("class", "node")
                .attr("transform", function(d) {
                    return "translate(" + d.x + "," + d.y + ")";
                });

            node.append("title")
                .text(function(d) {
                    const count = d.data.Count ? humanformat(d.data.Count) : 0;
                    return d.data.Name + ": " + count
                });

            node.append("circle")
                .attr("r", function(d) {
                    return d.r;
                })
                .style("fill", function(d,i) {
                    return color(i);
                });

            node.append("text")
                .attr("dy", ".2em")
                .style("text-anchor", "middle")
                .text(function(d) {
                    return d.data.Name.substring(0, d.r / 3);
                })
                .attr("font-family", "sans-serif")
                .attr("font-size", function(d){
                    return d.r/5;
                })
                .attr("fill", "white");
            
        
            node.append("text")
                .attr("dy", "1.3em")
                .style("text-anchor", "middle")
                .text(function(d) {
                    const count = d.data.Count ? humanformat(d.data.Count) : 0;
                    return count;
                })
                .attr("font-family",  "Gill Sans", "Gill Sans MT")
                .attr("font-size", function(d){
                    return d.r/5;
                })
                .attr("fill", "white");

            d3.select(self.frameElement)
                .style("height", diameter + "px");
        }
    }
}
</script>

<style lang="scss" scoped>
   #graph {
       width: 200px;
       height: 200px;
   }
</style>
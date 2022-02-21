<template>
    <div class="socials">
       <div id="graph" width="150" height="150"></div>
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
        window.scrollTo(0, 0);
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
                     const brand = d.data
                        .Name
                        .toLowerCase();
                    const colors = {
                        instagram: '#5851DB',
                        twitter: '#1DA1F2',
                        facebook: '#3B5998',
                        pinterest: '#BD081C',
                    }
                    return colors[brand];
                });

            node
                .append("svg:image")
                .attr("xlink:href", (d) => {
                    const brand = d.data
                        .Name
                        .toLowerCase()
                    return "/images/icons/" + brand + "-brands.svg";
                })
                .attr("width", (d) => {
                    return  d.r / 2;  
                })
                .attr("height", (d) => {
                    return  d.r / 2; 
                })
                .attr("fill", "white")
                .attr("font-size", function(d){
                    return d.r/5;
                })
                .attr("style", function(d) {
                    const x = (d.r / 2) / 2;
                    const y = (d.r / 2) / 2;
                    return `transform:translate(-${x}px, -${y}px)`;
                });
            
            d3.select(self.frameElement)
                .style("height", diameter + "px");
        }
    }
}
</script>

<style lang="scss">
  .bubble {
        top: 0;
        left: 0;
        position: absolute; 
    }
</style>

<style lang="scss" scoped>
   #graph {
       width: 200px;
       height: 200px;
       position: relative;

       .bubble {
          top: 0;
          left: 0;
          position: absolute; 
       }
   }
</style>
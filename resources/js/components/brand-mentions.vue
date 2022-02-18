<template>
    <div class="brand-mentions" v-if="Object.keys(brands).length">
        <span>
            BRAND MENTIONS
        </span>
        <div class="brand" v-for="(logo, name) in brands" :key="name">
            <div class="logo">
                <img :src="logo" alt="brand" />
            </div>
            {{ name }}
        </div>
    </div>
</template>

<script>
export default {
    name: 'brandmentions',

    props: {
        item: {
            type: Object,
            default: () => ({}),
        }
    },

    data() {
        return {
            brands: {},
        }
    },

    mounted() {
        const decode = this.decodeBrandGraph();
        for(let item in decode) {
            item = decode[item];
            if (item.brand_logo) {
                const logo = item.brand_logo;
                const name = item.brand_name;
                if ( ! this.brands[name]) {
                    this.brands[name] = '';
                }
                this.brands[name] = logo
                this.brands = {...this.brands}
            }
        }
    },

    methods: {
        decodeBrandGraph() {
            return JSON.parse(this.item.attributes.brandgraph_matches_json_str)
        },
    }
}
</script>

<style lang="scss">
    .brand-mentions {
        span {
            font-size: 12px;
            font-weight: 500;
            margin-right: 10px;
            text-transform: uppercase;
        }

        .brand {
            padding: 2px 6px 2px 2px;
            margin-right: 5px;
            background-color: #f2f2f2;
            border-radius: 25px;
            align-items: center;
            cursor: pointer;
            display: inline-flex;
            font-size: 12px;
            font-weight: 500;
        }

        .logo {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            margin-right: 5px;
            overflow: hidden;

            img {
                object-fit: cover;
                width: 100%;
                height: 100%;
            }
        }

        .name {
            font-size: 14px;
        }
        
    }
</style>
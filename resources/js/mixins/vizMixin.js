import { mapActions, mapState } from "vuex";
export default {  
    methods: {
        ...mapActions("viz", ['setItems', 'setFilter', 'setItem']),
        fetchDataViz() {
            this.startLoader();
            let query = this.searchVizQueryViz()
            fetch(`/api/v1/search/viz`, {
                method: 'post',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    query,
                }),
            })
                .then(r => r.json())
                .then(async ({ data, meta}) => {
                    this.setItems(data)
                    this.setFilter({
                        ...this.filter,
                        total: meta.total,
                    })
                    this.stopLoader();
                });
        },
        onClickPage(page) {
            this.setFilter({
                ...this.filter,
                page,
            });
            this.fetchDataViz();
        },

        getBrendLogo(item) {
            const data = item.attributes.brandgraph_matches_json_str ? JSON.parse(item.attributes.brandgraph_matches_json_str) : {}
            const [brend] = Object.values(data)

            if (brend) {
                let logo = brend.brand_owner_logo ? brend.brand_owner_logo : brend.brand_logo;
                if ( ! logo) {
                    logo = brend.theme_logo;
                }
                return logo
            }
            return '';
        },
        searchVizQueryViz() {
            let startDate = '2022-02-04';
            let source_type = [
                'youtube_post_discovered',
                'tiktok_post_discovered',
                'instagram_post_discovered',
                'instagram_post_on_platform',
                'youtube_post_on_platform',
                'pinterest_post_on_platform',
                'pinterest_post_on_platform',
            ];
            
            let per_page = this.filter.per_page;
            let page = this.filter.page;
            let sort = '-score';
            let collapse = 'true';

            return `?filter[startDate]=${startDate}&` + source_type.map(item => `filter[content_source_type][]=${item}`).join('&') + `&filter[query]=_exists_:brandgraph_fields.brand_ids AND !(brandgraph_fields.category_names:"Social Network")&filter[collapse]=${collapse}&page[size]=${per_page}&page[number]=${page}&sort=${sort}`;
        },
    },

    computed: {
        ...mapState("viz", ['filters']),
    }
}
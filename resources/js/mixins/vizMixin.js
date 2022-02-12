import { mapActions, mapState } from "vuex";
import moment from 'moment';

export default {  
    data() {
        return {
            connectionsOptions: [
                {
                    label: 'Any',
                    value: null,
                },
                {
                    label: 'Instagram',
                    value: 'instagram'
                },
                {
                    label: 'Pinterest',
                    value: 'pinterest'
                },
                {
                    label: 'Youtube',
                    value: 'youtube',
                },
                {
                    label: 'TikTok',
                    value: 'tiktok',
                },
            ],
            statusOptions: [
                {
                    label: 'Any',
                    value: null,
                },
                {
                    label: 'On Platform',
                    value: 'on_platform'
                },
                {
                    label: 'Discovered',
                    value: 'discovered'
                },
            ]
        }
    },

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

        onChangeFilter() {
            this.fetchDataViz();
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
            let startDate = this.filter.date.startDate ? moment(this.filter.date.startDate).format('YYYY-MM-DD') :  '';
            let endDate = this.filter.date.endDate ? moment(this.filter.date.endDate).format('YYYY-MM-DD')  : '';
            const status = this.filter.status ? this.filter.status : '';
            const search = this.filter.search ? this.filter.search : '';
            const connection = this.filter.connection ? this.filter.connection : '';
            
            let per_page = this.filter.per_page;
            let page = this.filter.page;
            let sort = '-score';

            if ( ! startDate) {
                if ( ! connection && ! status) {
                    startDate = moment().subtract(7,'d').format('YYYY-MM-DD');
                }
            }

            let query = '';
            let network = '';

            if (connection) {
                query += `filter[reach][0][content_type][]=${connection}_post&`
                query += `filter[reach][0][min]=0&`
            }

            if (startDate) {
                query += `filter[startDate]=${startDate}&`
                network = `filter[query]=_exists_:brandgraph_fields.brand_ids AND !(brandgraph_fields.category_names:"Social Network")&`
            }

            if (search) {
                query += `filter[query]=${search}&`
            }

            if (endDate) {
                query += `filter[endDate]=${endDate}&`
            }

            if (status) {
                query += `filter[is_discovered]=${['is_discovered'].includes(status) ? 'true' : 'false' }&`
            }

            return `${query}filter[content_source_type][]=youtube_post_discovered&filter[content_source_type][]=tiktok_post_discovered&filter[content_source_type][]=instagram_post_discovered&filter[content_source_type][]=instagram_post_on_platform&filter[content_source_type][]=youtube_post_on_platform&filter[content_source_type][]=pinterest_post_on_platform&${network}filter[collapse]=true&page[size]=${per_page}&page[number]=${page}&sort=${sort}`;
        }
    },

    computed: {
        ...mapState("viz", ['filter']),
        

    }
}
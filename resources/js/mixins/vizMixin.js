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
        ...mapActions({
            setItemsViz: 'viz/setItems',
            setFilterViz: 'viz/setFilter',
            setItemViz: 'viz/setItem',
        }),
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
                    this.setItemsViz(data)
                    this.setFilterViz({
                        ...this.filterVizSearch,
                        total: meta.total,
                    })
                    this.stopLoader();
                });
        },

        onChangeFilter() {
            this.fetchDataViz();
        },

        onClickPage(page) {
            this.setFilterViz({
                ...this.filterVizSearch,
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
            let startDate = this.filterVizSearch.date.startDate ? moment(this.filterVizSearch.date.startDate).format('YYYY-MM-DD') :  '';
            let endDate = this.filterVizSearch.date.endDate ? moment(this.filterVizSearch.date.endDate).format('YYYY-MM-DD')  : '';
            const status = this.filterVizSearch.status ? this.filterVizSearch.status : '';
            const search = this.filterVizSearch.search ? this.filterVizSearch.search : '';
            const connection = this.filterVizSearch.connection ? this.filterVizSearch.connection : '';
            
            let per_page = this.filterVizSearch.per_page;
            let page = this.filterVizSearch.page;
            let sort = '-score';

            if ( ! startDate) {
                if ( ! connection && ! status && ! search) {
                    startDate = moment().subtract(7,'d').format('YYYY-MM-DD');
                }
            }

            let query = '';
            let network = '';

            if (connection) {
                query += `filter[reach][0][content_type][]=${connection}_post&`
                query += `filter[reach][0][min]=0&`
            }

            if (startDate && ! endDate) {
                query += `filter[startDate]=${startDate}&`
                network = `filter[query]=_exists_:brandgraph_fields.brand_ids AND !(brandgraph_fields.category_names:"Social Network")&`
            }

            if (startDate && endDate) {
                query += `filter[startDate]=${startDate}&`
           }

            if (search) {
                query += `filter[query]=${search}&`
            }

            if (startDate && endDate) {
                query += `filter[endDate]=${endDate}&`
            }

            if (status) {
                query += `filter[is_discovered]=${['on_platform'].includes(status) ? 'false' : 'true' }&`
            }

            return `${query}filter[content_source_type][]=youtube_post_discovered&filter[content_source_type][]=tiktok_post_discovered&filter[content_source_type][]=instagram_post_discovered&filter[content_source_type][]=instagram_post_on_platform&filter[content_source_type][]=youtube_post_on_platform&filter[content_source_type][]=pinterest_post_on_platform&${network}filter[collapse]=true&page[size]=${per_page}&page[number]=${page}&sort=${sort}`;
        },

        startLoader() {
            const el = document.getElementById('preloader')
            el.style.display = 'block'
            el.style['z-index'] = 999;
        },
        stopLoader() {
            const el = document.getElementById('preloader')
            el.style.display = 'none'
            el.style['z-index'] = 0;
        }
    },

    computed: {
        ...mapState("viz", {
            filterVizSearch: state => state.filter,
        }),
    }
}
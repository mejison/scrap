import { mapActions} from "vuex";
export default {
    data() {
        return {
            filter: {
                location: null,
                connections: null,
                communities: null,
                age: null,
                page: 1,
            },
            loaderInterval: null,
        }
    },
    methods: {
        ...mapActions("unity", ['setItems']),
        onChangeFilter() {
            this.filter = {
                ...this.filter,
                page: 1
            }
            this.fetchData();
        },
        onClickPrev() {
            this.filter = {
                ...this.filter,
                page: this.filter.page  - 1
            }
            this.fetchData();
        },
        onClickNext() {
            this.filter = {
                ...this.filter,
                page: this.filter.page  + 1
            }
            this.fetchData();
        },
        fetchData() {
            this.startLoader();
            this.setItems([]);
            let query = JSON.stringify(this.buildQueryBuilder)
            fetch(`/api/v1/search/unity?query=${query}&per_page=10&page=${this.filter.page}`)
                .then(r => r.json())
                .then(async ({ data }) => {
                    await data.forEach(async (item, index) => {
                        let dataMetric = await this.getMetric(item.id);
                        let dataRates = await this.getRates(item.id);
                        data[index] = {
                            ...data[index],
                            metrics: dataMetric.data.attributes,
                            rates: dataRates.data,
                        }
                        data = [...data]
                        this.setItems(data);
                        this.stopLoader();
                    });
                }).catch(() => {
                    this.stopLoader();
                })
        },
        async getMetric(unit_id) {
            return await fetch(`/api/v1/metrics/unity?unit_id=${unit_id}`).then(r => r.json())
        },
        async getRates(unit_id) {
            return await fetch(`/api/v1/rates/unity?unit_id=${unit_id}`).then(r => r.json())
        },
        async getContacts(unit_id) {
            return await fetch(`/api/v1/contacts/unity?unit_id=${unit_id}`).then(r => r.json())
        },
        async getOverview(unit_id) {
            return await fetch(`/api/v1/overview/unity?unit_id=${unit_id}`).then(r => r.json())
        },
        async getConnection(conn_id) {
            return await fetch(`/api/v1/connection/unity?conn_id=${conn_id}`).then(r => r.json())
        },
        async getConnectionPreperety(conn_id) {
            return await fetch(`/api/v1/connection-preperety/unity?conn_id=${conn_id}`).then(r => r.json())
        },
        async getAudienceAccount(conn_id) {
            return await fetch(`/api/v1/audience-account/unity?conn_id=${conn_id}`).then(r => r.json())
        },
        async searchContent(connection_id, organization_id) {
            const query = JSON.stringify(this.searchQueryBuilder(connection_id, organization_id));
            return await fetch(`/api/v1/search/content?query=${query}`).then(r => r.json())
        },
        async getWhiteLabelOrganizations() {
            return await fetch(`/api/v1/white-label-organizations`).then(r => r.json())
        },
        searchQueryBuilder(connection_id, organization_id) {
            return {
                "data":{
                   "attributes":{
                      "api-version":null,
                      "sort":"-created_at",
                      "total":null,
                      "organization-id":794978,
                      "opts":null,
                      "filter":{
                         "audienceAgeSource":null,
                         "audienceGenderSource":null,
                         "hasEmail":null,
                         "creatorNameQuery":null,
                         "creatorAccount":null,
                         "connectionName":null,
                         "creatorProperty":connection_id,
                         "docType":null,
                         "endDate":null,
                         "isDiscovered":null,
                         "isSponsored":null,
                         "query":null,
                         "startDate":null,
                         "metricsSeries":null
                      },
                      "page":{
                         "number":1,
                         "size":15
                      },
                      "aggs-result":null
                   },
                   "type":"content/searches"
                }
             };
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
        buildQueryBuilder() {
            const community = this.filter.communities && this.filter.communities.value ? this.filter.communities.value : '';
            const connections = this.filter.connections && this.filter.connections.value ? this.filter.connections.value : '';
            const age = this.filter.age && this.filter.age.value ? this.filter.age.value : '';
            const location = this.filter.location && this.filter.location.value ? this.filter.location.value : '';

            let rules = [];

            if (location) {
                rules = [
                    ...rules,
                    {
                        "condition": "AND",
                        "rules": [
                            {
                                "id": "country",
                                "field": "country",
                                "type": "string",
                                "input": "text",
                                "operator": "equal",
                                "value": location,
                                "group": "Creator"
                            },
                            {
                                "id": "discovered_country",
                                "field": "discovered_country",
                                "type": "string",
                                "input": "text",
                                "operator": "equal",
                                "value": location,
                                "group": "Creator"
                            }
                        ]
                    }
                ]
            }

            if (age) {
                rules = [
                    ...rules,
                    {
                        "condition": "AND",
                        "rules": [
                            {
                                "id": "user_age_from_birthday",
                                "field": "user_birthday",
                                "type": "integer",
                                "input": "select",
                                "operator": "greater_or_equal",
                                "value": age
                            }
                        ]
                    }
                ]
            }

            if (connections) {
                rules = [
                    ...rules,
                    {
                        "condition": "AND",
                        "rules" : [
                            {
                                "id": `${connections}_reach`,
                                "field": `${connections}_reach`,
                                "type": "integer",
                                "input": "text",
                                "operator": "greater",
                                "value": "0" 
                            },
                        ],
                    },
                ]
            }

            return {
                "condition" : "AND",
                "rules" : [
                    ...rules,
                    {
                        "condition" : "OR",
                        "rules" : [
                            {
                                "id" : "verticals",
                                "field" : "verticals",
                                "type" : "string",
                                "input" : "select",
                                "operator" : "equal",
                                "value" : community,
                                "group" : "Creator"
                            },
                            {
                                "id" : "connection_verticals",
                                "field" : "connection_verticals",
                                "type" : "string",
                                "input" : "select",
                                "operator" : "equal",
                                "value" : community
                            },
                            {
                                "id" : "list_tags",
                                "field" : "list_tags",
                                "type" : "string",
                                "input" : "select",
                                "operator" : "equal",
                                "value" : community
                            },
                        ]
                    }
                ]
            };
        },

    }
}
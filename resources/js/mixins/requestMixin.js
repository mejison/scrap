import { mapActions, mapState } from "vuex";
import commonMixin from "./commonMixin";
import moment from "moment";

export default {
    data() {
        return {
            loaderInterval: null,
        }
    },

    mixins: [
        commonMixin,
    ],
    
    methods: {
        ...mapActions("unity", ['setItems']),
        onChangeFilter() {
            this.setFilter({
                ...this.filter,
                page: 1
            });
            this.fetchData();
        },
        onClickPage(page) {
            this.setFilter({
                ...this.filter,
                page: page
            })
            this.fetchData();
        },
        fetchData() {
            this.setItems([]);
            this.startLoader();
            this.setFilter({
                ...this.filter,
                total: 0,
            });
            let query = JSON.stringify(this.buildQueryBuilder)
            fetch(`/api/v1/search/unity?query=${query}&per_page=10&page=${this.filter.page}&search=${this.filter.search}`)
                .then(r => r.json())
                .then(async ({ data, meta }) => {
                    if ( ! data.length) {
                        this.stopLoader();
                    }
                    
                    await data.forEach(async (item, index) => {
                        let dataMetric = await this.getMetric(item.id);
                        let dataRates = await this.getRates(item.id);
                        data[index] = {
                            ...data[index],
                            metrics: dataMetric.data.attributes,
                            rates: dataRates.data,
                        }
                        data = [...data]
                        
                        this.setFilter({
                            ...this.filter,
                            total: meta.total
                        });
                        
                        this.setItems(data);
                        this.stopLoader();
                    });
                })
                .catch(() => {
                    this.stopLoader();
                })
        },
        fetchDataViz() {
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
            let per_page = 20;
            let page = 1;
            let sort = '-score';
            let collapse = 'true';

            return `?filter[startDate]=${startDate}&` + source_type.map(item => `filter[content_source_type][]=${item}`).join('&') + `&filter[query]=_exists_:brandgraph_fields.brand_ids AND !(brandgraph_fields.category_names:"Social Network")&filter[collapse]=${collapse}&page[size]=${per_page}&page[number]=${page}&sort=${sort}`;
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
            return await fetch(`/api/v1/audience-account/unity?unit_id=${conn_id}`).then(r => r.json())
        },
        async searchContent(connection_id, organization_id) {
            const query = JSON.stringify(this.searchQueryBuilder(connection_id, organization_id));
            return await fetch(`/api/v1/search/content?query=${query}`).then(r => r.json())
        },
        async getWhiteLabelOrganizations() {
            return await fetch(`/api/v1/white-label-organizations`).then(r => r.json())
        },
        async searchLocation(characters, field) {
            return await fetch(`/api/v1/search-location?characters=${characters}&field=${field}`).then(r => r.json())
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
    },

    computed: {
        ...mapState("unity", ["filter"]),

        buildQueryBuilder() {
            const community = this.filter.communities && this.filter.communities.length ? this.filter.communities : [];
            const connections = this.filter.connections && this.filter.connections.length  ? this.filter.connections : [];
            const age = this.filter.age && this.filter.age.length ? this.filter.age : '';
            const accountcreated = this.filter.accountcreated && this.filter.accountcreated.length ? this.filter.accountcreated : '';
            const celebrity = this.filter.celebrity ? this.filter.celebrity : null;
            const education = this.filter.education ? this.filter.education : null;

            const ethnicity = this.filter.ethnicity && this.filter.ethnicity.length ? this.filter.ethnicity : null;
            const audienceAuthenticity = this.filter.audienceauthenticity && this.filter.audienceauthenticity.length ? this.filter.audienceauthenticity : null;
            const gender = this.filter.gender && this.filter.gender.length ? this.filter.gender : null;
            const income = this.filter.income ? this.filter.income : null;
            const sponsorshipIndex = this.filter.sponsorshipindex ? this.filter.sponsorshipindex : null;

            const locationRadius = this.filter.location && this.filter.location['location-radius'] ? this.filter.location['location-radius'] : false;
            const radiusSearch = this.filter.location && this.filter.location['radius-search'] ? this.filter.location['radius-search'] : false;
            const stateCountry = this.filter.location && this.filter.location['state-country'] ? this.filter.location['state-country'] : false;
            const lastLogin = this.filter.lastLogin ? this.filter.location['last-login'] : false;
            const relationshipStatus = this.filter.location['relationship'] ? this.filter.location['relationships'] : false;

            const radiusHumanFormat = {
                5: "five",
                10: "ten",
                25: "twenty_five",
                50: "fifty",
                100: "hundred",
            };

            let rules = [];

            if (radiusSearch) {
                let locationRules = [];

                radiusSearch.forEach(location => {
                    location = JSON.parse(location)
                    locationRules = [
                        ...locationRules,
                        ...[
                            {
                                field: "location",
                                group: "Creator",
                                id: "location",
                                input: "text",
                                operator: radiusHumanFormat[locationRadius] + "_miles",
                                type: "string",
                                value: location.value,
                            },
                        ]
                    ]
                });

                if (locationRules && locationRules.length) {
                    rules = [
                        ...rules,
                        {
                            "condition": "OR",
                            "rules": [
                                ...locationRules
                            ]
                        }
                    ]
                }
            }

            if (stateCountry) {
                let countryRules = []
                stateCountry.forEach(location => {
                    location = JSON.parse(location)
                    if (location.state) {
                        countryRules = [
                            ...countryRules,
                            ...[
                                {
                                    "id": "state",
                                    "field": "state",
                                    "type": "string",
                                    "input": "text",
                                    "operator": "equal",
                                    "value": location.state,
                                    "group": "Creator"
                                },
                                {
                                    "id": "discovered_state",
                                    "field": "discovered_state",
                                    "type": "string",
                                    "input": "text",
                                    "operator": "equal",
                                    "value": location.state,
                                    "group": "Creator"
                                },
                            ]
                        ]
                    } else {
                        countryRules = [
                            ...countryRules,
                            ...[
                                {
                                    "id": "country",
                                    "field": "country",
                                    "type": "string",
                                    "input": "text",
                                    "operator": "equal",
                                    "value": location.country,
                                    "group": "Creator"
                                },
                                {
                                    "id": "discovered_country",
                                    "field": "discovered_country",
                                    "type": "string",
                                    "input": "text",
                                    "operator": "equal",
                                    "value": location.country,
                                    "group": "Creator"
                                },
                            ]
                        ]
                    }
                });

                if (countryRules && countryRules.length) {
                    rules = [
                        ...rules,
                        {
                            "condition": "OR",
                            "rules": [
                                ...countryRules
                            ]
                        }
                    ]
                }
            }
            
            if (age) {
                if (age[0] != 0) {                
                    rules = [
                        ...rules,
                        {
                            "condition": "AND",
                            "rules": [
                                {
                                    field: "user_birthday",
                                    id: "user_age_from_birthday",
                                    input: "select",
                                    operator: "less_or_equal",
                                    type: "integer",
                                    value: age[0] * 1,
                                },
                                {
                                    field: "user_birthday",
                                    id: "user_age_from_birthday",
                                    input: "select",
                                    operator: "greater_or_equal",
                                    type: "integer",
                                    value: age[1] * 1,
                                }
                            ]
                        }
                    ]
                }
            }

            if (connections) {
                let selectedConnections = [];
                connections.forEach(item => {
                    if (item.from != 0 && item.to != 0) {
                        selectedConnections = [
                            ...selectedConnections,
                            {
                                "id": `${item.value}_reach`,
                                "field": `${item.value}_reach`,
                                "type": "integer",
                                "input": "text",
                                "operator": "between",
                                "value": [item.from, item.to]
                            },
                        ]
                    } else if (item.from != 0 && item.to == 5000000) {
                        selectedConnections = [
                            ...selectedConnections,
                            {
                                "id": `${item.value}_reach`,
                                "field": `${item.value}_reach`,
                                "type": "integer",
                                "input": "text",
                                "operator": "greater",
                                "value": item.from
                            },
                        ]
                    } else {
                        selectedConnections = [
                            ...selectedConnections,
                            {
                                "id": `${item.value}_reach`,
                                "field": `${item.value}_reach`,
                                "type": "integer",
                                "input": "text",
                                "operator": "greater",
                                "value": "0"
                            },
                        ]
                    }
                });

                if (selectedConnections && selectedConnections.length) {
                    rules = [
                        ...rules,
                        {
                            "condition": "AND",
                            "rules" : [
                                ...selectedConnections
                            ],
                        },
                    ]
                }
            }

            if (community) {
                let selectedCommunity = [];

                community.forEach(item => {
                    selectedCommunity = [
                        ...selectedCommunity,
                        ...[
                            {
                                "id" : "verticals",
                                "field" : "verticals",
                                "type" : "string",
                                "input" : "select",
                                "operator" : "equal",
                                "value" : item,
                                "group" : "Creator"
                            },
                            {
                                "id" : "connection_verticals",
                                "field" : "connection_verticals",
                                "type" : "string",
                                "input" : "select",
                                "operator" : "equal",
                                "value" : item
                            },
                            {
                                "id" : "list_tags",
                                "field" : "list_tags",
                                "type" : "string",
                                "input" : "select",
                                "operator" : "equal",
                                "value" : item
                            },
                        ]
                    ]
                });

                if (selectedCommunity && selectedCommunity.length) {
                    rules = [
                        ...rules,
                        {
                            "condition" : "OR",
                            "rules" : [
                                ...selectedCommunity,
                            ]
                        }
                    ]
                }
            }

            if (accountcreated) {
                let rulesAccountCreated = [];
                
                accountcreated.forEach(item => {
                    if (item.to && ! item.from) {
                        const dateTo = moment().subtract(item.to, 'd').format('YYYY-MM-DD');
                       
                        rulesAccountCreated = [
                            ...rulesAccountCreated,
                            {
                                "id": "created_at",
                                "field": "created_at",
                                "type": "time",
                                "input": "text",
                                "group": "Creator",
                                "optionId": `last${item.to}`,
                                "operator": "greater",
                                "value": dateTo
                            },
                        ]
                    }

                    if ( ! item.to && item.from) {
                        const dateFrom = moment().subtract(item.from, 'd').format('YYYY-MM-DD');
                       
                        rulesAccountCreated = [
                            ...rulesAccountCreated,
                            {
                                field: "created_at",
                                group: "Creator",
                                id: "created_at",
                                input: "text",
                                operator: "less",
                                optionId: "older" + item.from,
                                type: "time",
                                value: dateFrom                             
                            },
                        ]
                    }

                    if (item.from && item.to) {
                        const dateFrom = moment().subtract(item.to, 'd').format('YYYY-MM-DD');
                        const dateTo = moment().subtract(item.from,'d').format('YYYY-MM-DD');

                        rulesAccountCreated = [
                            ...rulesAccountCreated,
                            {
                                "id": "created_at",
                                "field": "created_at",
                                "type": "time",
                                "input": "text",
                                "group": "Creator",
                                "optionId": `${item.from}to${item.to}`,
                                "operator": "between",
                                "value": [
                                    dateFrom,
                                    dateTo
                                ],
                            },
                        ]
                    }
                })
                

                rules = [
                    ...rules,
                    {
                        "condition": "OR",
                        "rules": [
                            ...rulesAccountCreated,
                        ]
                    }
                ];
            }

            if (celebrity) {
                rules = [
                    ...rules,
                    {
                        "condition": "OR",
                        "rules": [
                            {
                                "id": "is_celebrity",
                                "field": "is_celebrity",
                                "type": "boolean",
                                "input": "select",
                                "operator": "equal",
                                "value": celebrity.value ? 'true' : 'false'
                            }
                        ]
                    }
                ];
            }

            if (education) {
                let rulesEducation = [];
                
                education.forEach(item => {
                    if (item) {
                        rulesEducation = [
                            ...rulesEducation,
                            {
                                field: "education",
                                group: "Creator",
                                id: "education",
                                input: "select",
                                operator: "equal",
                                type: "string",
                                value: item,
                            },
                        ]
                    }
                })
                

                rules = [
                    ...rules,
                    {
                        "condition": "OR",
                        "rules": [
                            ...rulesEducation,
                        ]
                    }
                ];
            }

            if (ethnicity) {
                let rulesEthnicity = [];
                
                ethnicity.forEach(item => {
                    if (item) {
                        rulesEthnicity = [
                            ...rulesEthnicity,
                            {
                                "id": "user_race",
                                "field": "user_race",
                                "type": "string",
                                "input": "select",
                                "operator": "equal",
                                "value": item,
                                "group": "Creator"
                            },
                        ]
                    }
                });
                
                rules = [
                    ...rules,
                    {
                        "condition": "OR",
                        "rules": [
                            ...rulesEthnicity,
                        ]
                    }
                ];
            }

            if (audienceAuthenticity) {
                let audienceAuthenticityEthnicity = [];
                
                audienceAuthenticity.forEach(item => {
                    if (item) {
                        audienceAuthenticityEthnicity = [
                            ...audienceAuthenticityEthnicity,
                            {
                                "id": "fake_followers_bin",
                                "field": "fake_followers_bin",
                                "type": "integer",
                                "input": "select",
                                "operator": "equal",
                                "value": item,
                                "group": "Creator",
                            },
                        ]
                    }
                });
                
                rules = [
                    ...rules,
                    {
                        "condition": "OR",
                        "rules": [
                            ...audienceAuthenticityEthnicity,
                        ]
                    }
                ];
            }

            if (gender) {
                let genderRules = [];
                
                gender.forEach(item => {
                    if (item) {
                        genderRules = [
                            ...genderRules,
                            {
                                data: {
                                    discovered_field: "discovered_gender",
                                },
                                field: "user_gender",
                                group: "Creator",
                                id: "user_gender",
                                input: "select",
                                operator: "in",
                                type: "string",
                                value: item,
                            },
                        ]
                    }
                });
                
                rules = [
                    ...rules,
                    {
                        "condition": "OR",
                        "rules": [
                            ...genderRules,
                        ]
                    }
                ];
            }

            if (income) {
                let incomeRules = [];
                
                income.forEach(item => {
                    if (item) {
                        incomeRules = [
                            ...incomeRules,
                            {
                                field: "user_income",
                                group: "Creator",
                                id: "user_income",
                                input: "select",
                                operator: "equal",
                                type: "string",
                                value: item
                            },
                        ]
                    }
                });
                
                rules = [
                    ...rules,
                    {
                        "condition": "OR",
                        "rules": [
                            ...incomeRules,
                        ]
                    }
                ];
            }

            if (sponsorshipIndex) {

            }

            if (lastLogin) {
               // "{\"condition\":\"AND\",\"rules\":[{\"condition\":\"OR\",\"rules\":[{\"id\":\"last_sign_in_at\",\"field\":\"last_sign_in_at\",\"type\":\"time\",\"input\":\"text\",\"group\":\"Creator\",\"optionId\":\"7to14\",\"operator\":\"between\",\"value\":[\"2022-02-18\",\"2022-02-25\"]}]}]}"
            }

            if (relationshipStatus) {
                
            }

            return {
                "condition" : "AND",
                "rules" : [
                    ...rules,
                ]
            };
        },
    }
}
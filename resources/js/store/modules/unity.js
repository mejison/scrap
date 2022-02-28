export default {
    namespaced: true,

    state: {
        items: [],
        item: {},
        filter: {
            location: {
                'location-radius': 5,
                'radius-search': [],
                'state-country': [],
            },
            connections: [],
            communities: [],
            age: [0, 120],
            accountcreated: null,
            celebrity: null,
            page: 1,
            per_page: 20,
            total: 0,
            search: '',
        },
    },

    actions: {
        setItems({ commit }, data) {
            commit('setItems', data)
        },
        setItem({ commit }, data) {
            commit('setItem', data)
        },
        setFilter({ commit }, data) {
            commit('setFilter', data)
        },
    },

    mutations: {
        setItems(state, data) {
            state.items = data;  
        },
        setItem(state, data) {
            state.item = data;
        },
        setFilter(state, data) {
            state.filter = data;
        },
    },
}
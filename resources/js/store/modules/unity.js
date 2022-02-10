export default {
    namespaced: true,

    state: {
        items: [],
        item: {},
        filter: {
            location: null,
            connections: null,
            communities: null,
            age: null,
            page: 1,
            per_page: 10,
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
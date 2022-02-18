export default {
    namespaced: true,

    state: {
        items: [],
        item: null,
        filter: {
            connection: {
                from: 0,
                to: 5000000,
                value: "",
            },
            status: '',
            email: '',
            location_instagram: '',
            page: 1,
            per_page: 20,
            total: 0,
            search: '',
            date: {
                startDate: '',
                endDate: '',
            },
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
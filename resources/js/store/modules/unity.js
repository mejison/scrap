export default {
    namespaced: true,

    state: {
        items: [],
        item: {},
    },

    actions: {
        setItems({ commit }, data) {
            commit('setItems', data)
        },
        setItem({ commit }, data) {
            commit('setItem', data)
        },
    },

    mutations: {
        setItems(state, data) {
            state.items = data;  
        },
        setItem(state, data) {
            state.item = data;
        },
    },
}
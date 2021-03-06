import VueRouter from 'vue-router'

import UnitySearch from './pages/unity-search'
import Profile from './pages/profile'

import VizSearch from './pages/viz-search'
import Test from './pages/test'

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '',
            name: 'UnitySearch',
            component: UnitySearch
        },
        {
            path: `/profile/:id`,
            name: 'Profile',
            component: Profile
        },
        {
            path: '/search-viz',
            name: 'VizSearch',
            component: VizSearch
        },
        {
            path: '/test',
            name: 'Test',
            component: Test
        },
    ],
});
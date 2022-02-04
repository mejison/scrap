import VueRouter from 'vue-router'

import UnitySearch from './pages/unity-search'
import Profile from './pages/profile'

import VizSearch from './pages/viz-search'

export default new VueRouter({
    // mode: 'history',
    routes: [
        {
            path: '/search-unity',
            name: 'UnitySearch',
            component: UnitySearch
        },
        {
            path: `/search-unity/profile/:id`,
            name: 'Profile',
            component: Profile
        },
        {
            path: '/search-viz',
            name: 'VizSearch',
            component: VizSearch
        },
    ],
});
import VueRouter from 'vue-router'

import Discovery from './pages/discovery'
import Profile from './pages/profile'

export default new VueRouter({
    // mode: 'history',
    routes: [
        {
            path: '/search',
            name: 'Discovery',
            component: Discovery
        },
        {
            path: `/search/profile/:id`,
            name: 'Profile',
            component: Profile
        },
    ],
});
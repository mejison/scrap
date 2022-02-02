import VueRouter from 'vue-router'

import Discovery from './pages/discovery'
import Profile from './pages/profile'

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/unity-search',
            name: 'Discovery',
            component: Discovery
        },
        {
            path: `/profile/:id`,
            name: 'Profile',
            component: Profile
        },
    ],
});
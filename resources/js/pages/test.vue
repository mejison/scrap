<template>
    <div>   
        <!-- <test-graph /> -->
        <RecentContentDropdown label="Connection" :options="options" />
    </div>
</template>

<script>
import TestGraph from '../components/test-graph.vue'
import RecentContentDropdown from '../components/recent-content-dropdown.vue'

export default {
    components: {
        TestGraph,
        RecentContentDropdown,
    },

    data() {
        return {
            options: [
                {
                    label: 'Instagram',
                    type: 'instagram',
                    value: 'instagram',
                },
                {
                    label: 'Pinterest',
                    type: 'pinterest',
                    value: 'pinterest',
                },
            ]
        }
    }
}
</script>
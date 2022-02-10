<template>
    <div class="flex justify-content">
        <dropdown label="Network" :options="optionsNetwork" />
        <dropdown label="Show Results By" :options="optionsResultsBy"  />
        <dropdown label="Date Posted" :options="optionsPosted"  />
        <dropdown label="Instagram Post Location" :options="optionsPostLocation"  />
        <dropdown label="Connection" :options="optionsConnections"  />
        <dropdown label="Engament Rate" :options="optionsRates"  />
        <dropdown label="Status" :options="optionsStatus"  />
    </div>
</template>

<script>
import Dropdown from '../dropdown.vue';

export default {
    components: {
        Dropdown,
    },

    data() {
        return {
            optionsNetwork: [],
            optionsResultsBy: [],
            optionsPosted: [],
            optionsPostLocation: [],
            optionsConnections: [],
            optionsRates: [],
            optionsStatus: [],
        }
    },
    
}
</script>
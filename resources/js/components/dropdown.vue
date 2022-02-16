<template>
    <div class="dropdown custom-dropdown mb-2">
        <div class="btn bg-white d-flex align-items-center" data-toggle="dropdown">
            <div class="text-left mr-3">
                <span class="text-black">{{ value && value.value ? value.label : label }}</span>
            </div>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
        </div>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" 
                v-for="(option, index) in options" 
                :key="index"
                @click.prevent="onSelect(option)"
                >
                    {{ option.label }}
                </a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'DropDown',

    props: {
        label: {
            default: "Dropdown",
            type: String,
        },
        options: {
            default: [],
            type: Array
        },
        value: {
            type: [Object, Number],
            default: () => ({})
        },
    },

    methods: {
        onSelect(option) {
            this.$emit('input', option);
        },
    },
}
</script>

<style lang="scss">
    .dropdown-menu {
        max-height: 300px;
        overflow: auto;
    }
</style>
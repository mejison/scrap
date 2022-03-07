<template>
    <div class="dropdown custom-dropdown age-audience mb-2">
        <div class="btn bg-white d-flex align-items-center" @click.prevent="onToggle">
            <div class="text-left mr-3">
                <span class="text-black">{{ value && value.length ? (value.length >= 2 ? "Multiple Created Dates" : 'Created ' + value.map(item => item.label).join(', ')) + ' Days' : label }}</span>
            </div>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
        </div>
        <div class="menu-right" :class="{'show': isShow}">
            <label 
                v-for="(option, index) in options" 
                :key="index"
                @click.stop
                >
                <input
                    @change.stop.prevent="onSelect(option)" 
                    type="checkbox"
                    :value="option.value"
                    name="selected" 
                    v-model="payload"
                /> &nbsp;
                {{ option.label }}
            </label>
        </div>
    </div>
</template>

<script>

export default {
    name: 'AgeAudienceDropDown',

    props: {
        label: {
            default: "AgeAudienceDropDown",
            type: String,
        },
        options: {
            default: [],
            type: Array
        },
        value: {
            type: Array,
            default: () => ([])
        },
    },

    data() {
        return {
            payload: [],
            isShow: false,
        }
    },


    mounted() {
        document.body.addEventListener('click', (e) => {
            const target = e.target;
            if ( ! target.closest(".age-audience")) {
                this.isShow = false;
            }
        }, false);
    },

    methods: {
        onToggle() {
            this.isShow = ! this.isShow
        },
        onSelect() {
            let value = [];
            this.payload.forEach((item) => {
                const part = item.split('-')
                let from = part[0];
                let to = part[1];

                value = [
                    ...value,
                    {
                        label: from && to ? `${from} to ${to}` : (to && ! from ? `Last ${to}` : (from && ! to ? `Older than ${from}` : '')),
                        from,
                        to,
                    }
                ]
            });
            this.$emit('input', value);
        },
    }
}
</script>

<style lang="scss" scoped>
    .dropdown-menu {
        max-height: 300px;
        overflow: auto;
    }

    .accountcreated {
        position: relative;
        display: inline-block;

        .menu-right {
            position: absolute;
            display: flex;
            flex-direction: column;
            z-index: -1;
            top: 50px;
            left: 0;
            width: 400px; 
            opacity: 0; 
            visibility: hidden; 
            padding: 30px;
            background: #fff;
            box-shadow: 0 10px 40px 0 rgb(32 28 69 / 10%);
            margin-top: 0;
            border-radius: 0.75rem;

            &.show {
                opacity: 1;
                z-index: 1001;
                visibility: visible;
            }
        }
    }
</style>
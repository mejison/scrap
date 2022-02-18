<template>
    <div class="email">
        <div class="btn bg-white d-flex align-items-center" @click.prevent="onToggle">
            <div class="text-left mr-3">
                <span class="text-black">{{ getLabel }}</span>
            </div>
            <i class="fa fa-caret-down"></i>
        </div>
        <div class="menu-right" :class="{'show': isShow}">
            <div class="email-dropdown card card-body">
                <label>
                    <input 
                        @change.stop.prevent="onSelect($event)" 
                        type="checkbox"
                        name="any"
                        v-model="payload"
                    />
                    Any
                </label>
                <label>
                    <input 
                        @change.stop.prevent="onSelect($event)" 
                        type="checkbox"
                        name="email_available"
                        v-model="payload"
                    />
                    Creator Email is Available
                </label>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'EmailDropdown',

    props: {
        value: {
            type: Object,
            default: () => ({})
        }
    },

    data() {
        return {
            isShow: false,
            payload: null,
        }
    },

    mounted() {
        document.body.addEventListener('click', (e) => {
            const target = e.target;
            if (target && ! target.closest(".email")) {
                this.isShow = false;
            }
        }, false);
    },

    methods: {
        onToggle() {
            this.isShow = ! this.isShow;
        },
        onSelect(event) {
            const value = event.target.value
            this.payload = value
            this.$emit('input', value)
        },
    },

    computed: {
        getLabel() {
            return this.payload
        }
    }
}
</script>

<style lang="scss">
    .email {
        position: relative;
        display: inline-block;

        .menu-right {
            position: absolute;
            z-index: -1;
            top: 50px;
            left: 0;
            width: 400px; 
            opacity: 0; 
            visibility: hidden; 

            &.show {
                opacity: 1;
                z-index: 1001;
                visibility: visible;
            }
        }
    }
</style>
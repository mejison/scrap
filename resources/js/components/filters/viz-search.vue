<template>
    <div class="flex justify-content">
        <!-- <dropdown label="Connection" :options="connectionsOptions" v-model="connection" @input="onInputConnection"  /> -->
        <connectiondropdown label="Connections" v-model="connection" :options="connectionsOptions" @input="onInputConnection" />
        <dropdown label="Status" :options="statusOptions"  v-model="status" @input="onInputStatus" />
        

        <div class="btn bg-white">
            <date-range-picker
                ref="picker"
                control-container-class=""
                v-model="dateRange"
                @update="updateValues"
            >
                <template v-slot:input="picker" style="min-width: 350px;">
                    {{ moment(picker.startDate).format('YYYY-MM-DD') }} - {{ moment(picker.endDate).format('YYYY-MM-DD') }}
                </template>
            </date-range-picker>
        </div>

       <dropdown label="Email" :options="emailOptions"  v-model="email" @input="onInputEmail" />
        
        <a href="javascript:void(0);" class="btn ml-auto" @click.prevent="onClickClear">
            Clear filter
        </a>
    </div>
</template>

<script>
import Dropdown from '../dropdown.vue';
import connectiondropdown from '../connection-dropdown.vue'
import emaildropdown from '../email-dropdown.vue'
import vizMixin from '../../mixins/vizMixin'
import moment from 'moment';
import DateRangePicker from 'vue2-daterange-picker'
import 'vue2-daterange-picker/dist/vue2-daterange-picker.css'

export default {
    components: {
        Dropdown,
        DateRangePicker,
        connectiondropdown,
        emaildropdown,
    },

    mixins: [
        vizMixin,
    ],

    data() {
        return {
            connection: null,
            status: null,
            email: null,
            dateRange: {
                startDate:  moment().format('YYYY-MM-DD'),
                endDate: moment().format('YYYY-MM-DD'),
            },
            moment: moment,
        }
    },

    methods: {
        onInputEmail(value) {
            this.setFilterViz({
                ...this.filterVizSearch,
                email: value
            })
            this.$emit('change')
        },
        updateValues(data) {
            this.setFilterViz({
                ...this.filterVizSearch,
                date: {
                    startDate: data.startDate,
                    endDate: data.endDate,
                }
            })
            this.$emit('change')
        },

        onClickClear() {
            this.connection = {
                from: 0,
                to: 5000000,
                value: "",
            };
            this.status =  null;
            this.dateRange = {
                startDate: moment().subtract(7,'d').format('YYYY-MM-DD'),
                endDate: moment().format('YYYY-MM-DD'),
            };

            this.setFilterViz({
                status: '',
                page: 1,
                per_page: 20,
                total: 0,
                search: '',
                date: {
                    start: '',
                    end: '',
                },
            });

            this.$emit('change')
        },

        onInputStatus({ value }) {
            this.setFilterViz({
                ...this.filterVizSearch,
                status: value
            })
            this.$emit('change')
        },

        onInputConnection(data) {
            this.setFilterViz({
                ...this.filterVizSearch,
                connection: data
            })
            this.$emit('change')
        }
    },

}
</script>
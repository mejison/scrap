<template>
    <div class="flex justify-content">
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
                    <span  class="text-black" v-if="selectedDate">{{ moment(picker.startDate).format('YYYY-MM-DD') }} - {{ moment(picker.endDate).format('YYYY-MM-DD') }}</span>
                    <span class="text-black" v-else>Date Posted <i class="fa fa-caret-down"></i></span>
                </template>
            </date-range-picker>
        </div>

       <dropdown label="Email" :options="emailOptions"  v-model="email" @input="onInputEmail" />

       <locationinstagramdropdown 
            label="Instagram Post Location" 
            v-model="location_instagram" 
            @input="onInputPostLocation"
        />
        
        <a href="javascript:void(0);" class="btn ml-auto" @click.prevent="onClickClear">
            Clear filter
        </a>
    </div>
</template>

<script>
import Dropdown from '../dropdown.vue';
import connectiondropdown from '../connection-dropdown.vue'
import locationinstagramdropdown from '../location-instagram-dropdown.vue'
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
        locationinstagramdropdown,
        emaildropdown,
    },

    mixins: [
        vizMixin,
    ],

    data() {
        return {
            connection: null,
            location_instagram: null,
            status: null,
            email: null,
            selectedDate: false,
            dateRange: {
                startDate:  moment().format('YYYY-MM-DD'),
                endDate: moment().format('YYYY-MM-DD'),
            },
            moment: moment,
        }
    },

    methods: {
        onInputPostLocation(query) {
            this.setFilterViz({
                ...this.filterVizSearch,
                location_instagram: query
            })
            this.$emit('change')
        },

        onInputEmail(value) {
            this.setFilterViz({
                ...this.filterVizSearch,
                email: value
            });
            this.$emit('change')
        },

        updateValues(data) {
            this.selectedDate = true;
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
            this.email = null;
            this.location_instagram = null;
            this.selectedDate = false;
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
        },
    },
}
</script>

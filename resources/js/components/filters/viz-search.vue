<template>
    <div class="flex justify-content">
        <dropdown label="Connection" :options="connectionsOptions" v-model="connection" @input="onInputConnection"  />
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

        <a href="javascript:void(0);" class="btn ml-auto" @click.prevent="onClickClear">
            Clear filter
        </a>
    </div>
</template>

<script>
import Dropdown from '../dropdown.vue';
import vizMixin from '../../mixins/vizMixin'
import moment from 'moment';
import DateRangePicker from 'vue2-daterange-picker'
import 'vue2-daterange-picker/dist/vue2-daterange-picker.css'
import { mapState } from 'vuex';

export default {
    components: {
        Dropdown,
        DateRangePicker,
    },



    mixins: [
        vizMixin,
    ],

    methods: {
        updateValues(data) {
            this.setFilter({
                ...this.filter,
                date: {
                    startDate: data.startDate,
                    endDate: data.endDate,
                }
            })
            this.$emit('change')
        },

        onClickClear() {
            this.connection = null;
            this.status =  null;
            this.dateRange = {
                startDate: moment().subtract(7,'d').format('YYYY-MM-DD'),
                endDate: moment().format('YYYY-MM-DD'),
            };

            this.setFilter({
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
            this.setFilter({
                ...this.filter,
                status: value
            })
            this.$emit('change')
        },

        onInputConnection({ value }) {
            this.setFilter({
                ...this.filter,
                connection: value
            })
            this.$emit('change')
        }
    },

    data() {
        return {
            connection: null,
            status: null,
            dateRange: {
                startDate:  moment().subtract(7, 'days').format('YYYY-MM-DD'),
                endDate: moment().format('YYYY-MM-DD'),
            },
            moment: moment,
        }
    },
}
</script>
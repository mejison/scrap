<template>
    <div>
        <a href="#">
            <h3 class="page-title my-4">Recent Content &nbsp; 
                <dropdown 
                    label="Connection"
                    v-model="currentConnection"
                    :options="connectionOptions" 
                    @input="onChange" />
            </h3>
        </a>
             <div class="row">
                <div 
                    class="col-3" v-for="(content, index) in items" :key="index">
                        <img 
                            v-if="content && content.attributes"
                            :src="content.attributes['content-preview']" 
                            class="img-thumbnail"
                            alt=""
                        />
                </div>
            </div>
    </div>
</template>

<script>
import requestMixin from '../mixins/requestMixin';
import Dropdown from '../components/dropdown.vue'

export default {
    name: 'RecentContent',

    components: {
        Dropdown,
    },

    props: {
        item: {
            type: Object,
            default: () => ({}),
        }
    },

    mixins: [requestMixin],

    data() {
        return {
            currentConnection: null,
            connectionOptions: [
                {
                    label: 'Any',
                    value: null
                },
            ],
            items: []
        }
    },

    watch: {
        item() {
            let options = [];
            this.item.connections.forEach(conn => {
                options = [...options, {
                    label: `${conn.attributes.publishable_type}: ${conn.attributes.connection_name}`,
                    type: conn.attributes.publishable_type,
                    value: conn.id,
                }];
            });

            if (options && options.length) {
                const instOption = options.find(item => item.type == 'InstagramProperty')
                this.fetchRecentPosts(instOption.value);
                this.currentConnection = instOption
            }

            this.connectionOptions = [
                ...this.connectionOptions,
                ...options
            ]
        }
    },

    methods: {
        onChange() {
            this.fetchRecentPosts(this.currentConnection.value);
        },
       async fetchRecentPosts(connection_id) {
           this.startLoader()
           const orgId = this.getOrganizationId();
           if (orgId) {
               this.items = [];
               const { included } = await this.searchContent(connection_id, orgId);
               if (included) {
                   this.items = included.slice(0, 4);
               }
               this.stopLoader();
           }
       },
       getOrganizationId() {
           if (this.item) {
               const [firstOrg] = this.item.organization
               return firstOrg.id;
           }
       },
    },
}
</script>
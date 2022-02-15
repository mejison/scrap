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
        <div class="carousel-wrapper" v-if="items && items.length">
             <split-carousel 
                :display-amount="7" 
                arrow-visible="always"  
                :autoplay="false"
                :height="200">
                <split-carousel-item v-for="(content, index) in items" :key="index">
                    <img 
                        v-if="content && content.attributes"
                        :src="content.attributes['content-preview']" 
                        class="img-item"
                        alt=""
                    />
                </split-carousel-item>
            </split-carousel>
        </div>
    </div>
</template>

<style lang="scss" scoped>

  .img-item {
      width: 100%;
      height: 100%;
      object-fit: cover;
  }
</style>

<script>
import requestMixin from '../mixins/requestMixin';
import Dropdown from '../components/dropdown.vue'
import { SplitCarousel, SplitCarouselItem } from "vue-split-carousel";

export default {
    name: 'RecentContent',

    components: {
        Dropdown,
        SplitCarousel,
        SplitCarouselItem
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
            items: [],
        }
    },

    watch: {
        item() {
            let options = [];
            this.item.connections.forEach(conn => {
                options = [...options, {
                    label: `${conn.attributes.publishable_type.replace('Property', '')}: ${conn.attributes.connection_name}`,
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
                   this.items = included
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
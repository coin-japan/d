<template>
    <b-modal id="update-string" title="BootstrapVue">
        <b-container fluid>
            <div class="form-group">
                <label for="section">Section</label>
                <input v-model="item.section_index" disabled="disabled" class="form-control"  id="section">
            </div>
            <div class="form-group">
                <label for="slug">Slug</label>
                <input v-model="item.slug" disabled="disabled" class="form-control" id="slug">
            </div>
            <div class="form-group">
                <label for="text">Text</label>
                <textarea v-model="item.text" class="form-control" id="text"></textarea>
            </div>
        </b-container>    
        <template v-slot:modal-footer="{ ok, cancel }">
            <b-button variant="primary" @click="send">Send</b-button>
            <b-button  @click="cancel()">Cancel</b-button>
        </template>
    </b-modal>  
</template>
<script>
export default {
    data() {
        return {
            item: {}
        }
    },
    props: {
        resourceItem: {}
    },
    watch: { 
      	resourceItem: function(val) {
          this.item = val;
        }
    },
    methods: {
        send() {

            const success = res => {
                this.$bvModal.hide('update-string');
            };

            const errors = errors => {
                const str = error.response.request.response;
                const obj = JSON.parse(str);
                console.log(obj.errors);
            }

            this.$http({url: 'strings/' + this.item.id, method: "PUT", data: this.item })
                .then(success)   
                .catch(errors);
        }
    },
    mounted() {
        this.item = this.resourceItem;
    },

}
</script>

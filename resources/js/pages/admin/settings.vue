<template>
    <div>
        <nav-admin></nav-admin>
        <div class="container">
            <div class="row mt-4">
                <div class="col-12 col-md-4">
                    <h2 class="h2 mb-2">Settings</h2>
                     <div v-if="is_success" class="alert alert-success alert-dismissible fade show" role="alert">
                        Changes has been saved!
                        <button v-on:click="is_success = false" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <b-form autocomplete="off" @submit.prevent="updateSettings">
                        <b-form-group 
                         v-for="setting in settings" 
                         v-bind:key="setting.id"
                         :label="titles[setting.setting_type]"
                         :label-for="setting.id">
                            <b-input
                             :name="setting.id"
                             v-model="setting.value"
                             type="text"
                            ></b-input>
                        </b-form-group>
                        <b-button type="submit" variant="primary">Save</b-button>
                        <router-link class="btn btn-danger" :to="{ path: '/admin' }">Cancel</router-link>
                    </b-form>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import navAdmin from './../../components/nav-admin';
    export default {
        data() {
            return {
                has_error: false,
                is_success: false,
                errors:[],
                settings: [],
                titles: [
                    "Instagram refresh token",
                    "Latest synchronization with instagram (UTC)"
                ]
            }
        },
        mounted() {
            this.getSettings();
        },
        methods: {
            getSettings() {
                this.$http({ url: 'settings', method: 'GET'})
                    .then(
                        (res) => {
                            this.settings = res.data.settings;
                        },
                        () => this.has_error = true
                    );
            },
            updateSettings() {
                this.errors = [];
                for(let i = 0; i < this.settings.length; i++)
                {
                    this.$http({url: 'setting/' + this.settings[i].id, method: "PUT", data: this.settings[i] })
                        .then(_ => this.is_success = true)
                        .catch(error => {
                            let str = error.response.request.response;
                            let obj = JSON.parse(str);
                            this.errors.push(obj.errors);
                        });
                }
                console.log(this.errors);
            }
        },
        components: {
            navAdmin
        }
    }
</script>
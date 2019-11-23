<template>
    <div>
        <nav-admin></nav-admin>
        <div class="container">
            <div class="alert alert-danger" v-if="has_error">
                Internal server error.
            </div>
            <div class="row mt-4">
                <div class="col-12 col-md-4">
                    <h2 class="h2 mb-2">{{ user.email }}</h2>
                    <div v-if="isSuccess" class="alert alert-success alert-dismissible fade show" role="alert">
                        Changes has been saved!
                        <button v-on:click="isSuccess = false" type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <b-form v-if="user" autocomplete="off" @submit.prevent="update">
                        <b-form-group label="Name" label-for="name">
                            <b-form-input id="name" v-model="user.name" type="text" required placeholder="Enter name"></b-form-input>
                            <span v-if="errors && errors.name && errors.name.length">{{ errors.name[0] }}</span>
                        </b-form-group>
                        <b-form-group label="User role">
                            <b-form-radio v-model="user.role" value="1">User</b-form-radio>
                            <b-form-radio v-model="user.role"  value="2">Admin</b-form-radio>
                        </b-form-group>
                        <b-button type="submit" variant="primary">Save</b-button>
                        <router-link class="btn btn-danger" :to="{path: '/admin/users'}">Cancel</router-link>
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
                userId: this.$route.params.id,
                user: null,
                errors: null,
                activeUser: this.$auth.user(),
                isSuccess: false
            }
        },
        mounted() {
            this.getUser();
        },
        methods: {
            getUser: function() {
                this.$http({url: 'users/' + this.userId, method: 'GET' }).then(
                    (res) => this.user = res.data.user,
                    () => this.has_error = true
                );
            },
            update: function() {
                this.errors = null;
                this.$http({url: 'users/' + this.userId, method: "PUT", data: this.user })
                    .then((res) => {
                        this.isSuccess = true;
                        this.user = res.data.user;
                    })   
                    .catch(error => {
                        let str = error.response.request.response;
                        let obj = JSON.parse(str);
                        this.errors = obj.errors;
                    });
            }
        },
        components: {
            navAdmin
        }
    }
</script>

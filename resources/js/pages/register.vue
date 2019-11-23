<template>
    <div>
        <nav-admin></nav-admin>
        <div class="container">
            <div class="row mt-4">
                <div class="col-12 col-md-4"> 
                    <h2 class="h2 mb-2">Register</h2>
                    <b-form autocomplete="off" @submit.prevent="register" v-if="!success">
                        <b-form-group
                         label="Name"
                         label-for="name"
                        >
                            <b-form-input
                             id="name"
                             v-model="name"
                             type="text"
                             required
                             placeholder="Enter name"
                            ></b-form-input>
                            <span v-if="has_error && errors.name">{{ errors.name }}</span>
                        </b-form-group>
                        <b-form-group
                         label="Email"
                         label-for="email"
                        >
                            <b-form-input
                             id="email"
                             v-model="email"
                             type="email"
                             required
                             placeholder="Enter email"
                            ></b-form-input>
                            <span v-if="has_error && errors.email">{{ errors.email }}</span>
                        </b-form-group>
                        <b-form-group
                         label="Password"
                         label-for="password"
                        >
                            <b-form-input
                             id="password"
                             v-model="password"
                             type="password"
                             required
                             placeholder="Enter password"
                            ></b-form-input>
                             <span v-if="has_error && errors.password">{{ errors.password }}</span>
                        </b-form-group>
                        <b-form-group
                         label="Confirm password"
                         label-for="password_confirmation"
                        >
                            <b-form-input
                             id="password_confiramtion"
                             v-model="password_confirmation"
                             type="password"
                             required
                             placeholder="Enter password confirmation"
                            ></b-form-input>
                            <span v-if="has_error && errors.password_confirmation">{{ errors.password_confirmation }}</span>
                        </b-form-group>
                        <b-button type="submit" variant="primary">Register</b-button>
                    </b-form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import navAdmin from './../components/nav-admin';

export default {
    data() {
        return {
            name: '',
            email: '',
            password: '',
            password_confirmation: '',
            has_error: false,
            error: '',
            errors: {},
            success: false
        }
    },
    components: {
        navAdmin
    },
    methods: {
        register() {
            var app = this;
            this.$auth.register({
                data: {
                    email: app.email,
                    password: app.password,
                    password_confirmation: app.password_confirmation
                },
                success: function() {
                    app.success = true;
                    this.$router.push({name: 'login', params: {successRegistrationRedirect: true}});
                },
                error: function (res) {
                    console.log(res.response.data.errors)
                    app.has_error = true
                    app.error = res.response.data.error
                    app.errors = res.response.data.errors || {}
                }
            });
        }
    }
}
</script>

<style>

</style>

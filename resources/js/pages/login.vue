<template>
    <div>
        <nav-admin></nav-admin>
        <div class="container">
            <div class="row mt-4">
                <div class="col-12 col-md-4">
                    <h2 class="h2 mb-2">Login</h2>
                    <b-alert v-model="is_login_error" variant="danger" dismissible>
                        Invalid email or password.
                    </b-alert>
                    <b-form autocomplete="off" @submit.prevent="login" action="POST">
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
                        </b-form-group>
                        <b-button type="submit" variant="primary">Login</b-button>
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
            email: '',
            password: '',
            is_login_error: false
        }
    },
    mounted() {

    },
    methods: {
        login() {
            var redirect = this.$auth.redirect();
            var app = this;
            this.$auth.login({
                params: {
                    email: app.email,
                    password: app.password
                },
                success: function() {
                    const redirectTo = redirect 
                        ? redirect.from.name : this.$auth.user().role === 2 ? 'admin' : 'dashboard';
                    this.$router.push({ name: redirectTo });
                },
                error: function(e) {
                    app.is_login_error = true
                },
                rememberMe: true,
                fetchUser: true
            });
        }
    },
    components: {
        navAdmin
    }
}
</script>
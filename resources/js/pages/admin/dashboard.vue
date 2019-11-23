<template>
    <div>
        <nav-admin></nav-admin>
        <div class="container pt-4">
            <div class="row">
                <div class="col-3">
                    <ul>
                        <li><router-link :to="{ path: '/admin/users' }">Users</router-link></li>
                        <li><router-link :to="{ path: '/admin/photos' }">Photos</router-link></li>
                        <li><router-link :to="{ path: '/admin/emails' }">Emails</router-link></li>
                    </ul>
                </div>
                <div class="col-3">
                    <ul>
                        <li><router-link :to="{ path: '/admin/settings' }">Settings</router-link></li>
                        <li> <router-link :to="{ path: '/admin/localization' }">Localization</router-link></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import navAdmin from './../../components/nav-admin';

    export default {
        components: {
            navAdmin
        }
    }
</script>

<style>
    .admin-dashboard-column {
        list-style: none;
    }
</style>

<template>
    <div>
        <nav-admin></nav-admin>
        <div class="container">
            <h2 class="h2 mt-4 mb-2">Users</h2>
            <div v-if="users == null || users.length == 0">
                <p>Not found..</p>
            </div>
            <table class="table table-bordered" v-if="users && users.length > 0">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th colspan="2">Registration Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" v-bind:key="user.id">
                        <th>{{ user.id }}</th>
                        <td>{{ user.name }}</td>
                        <td>{{ user.email }}</td>
                        <td>{{ user.created_at }}</td>
                        <td>
                            <button class="btn btn-danger float-right" v-on:click.stop="deleteUser(user.id)">Delete</button>
                            <router-link class="btn btn-primary float-right mr-1" :to="{ path: '/admin/user/' + user.id }">Edit</router-link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    import navAdmin from './../../components/nav-admin';
    export default {
        data() {
            return {
                has_error: false,
                users: null
            }
        },
        mounted() {
            this.getUsers();
        },
        methods: {
            getUsers() {
                this.$http({ url: 'users', method: 'GET'})
                    .then(
                        (res) => this.users = res.data.users,
                        () => this.has_error = true
                    );
                    
            },
            deleteUser(id) {
                this.$http({ url: 'users/' + id, method: 'DELETE'})
                    .then(
                        (res) => alert(res.data.message),
                        () => this.has_error = true
                    );
            }
        },
        components: {
            navAdmin
        }
    }
</script>

<style>

</style>

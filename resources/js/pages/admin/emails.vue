<template>
    <div>
        <nav-admin></nav-admin>
        <div class="container">
            <h2 class="h2 mt-4 mb-2">Contact requests</h2>
            <div v-if="isError" class="alert alert-danger">Internal server error.</div>
            <table v-if="!isError" class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th colspan="2">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in list" v-bind:key="item.id">
                        <td>{{ item.created_at }}</td>
                        <td>{{ inquaryType[+item.type] }}</td>
                        <td>{{ item.name }}</td>
                        <td>{{ item.email }}</td>
                        <td>{{ item.phone }}</td>
                        <td>{{ item.text }}</td>
                        <td>
                            <button v-on:click="onDeleteClick(item.id)" class="btn btn-danger float-right">Delete</button>
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
            isError: false,
            list: [],
            inquaryType: [
                'None',
                'Famous artist',
                'Promoute brand/product',
                'Partnership',
                'Other'
            ]
        }
    },
    components: {
        navAdmin
    },
    methods: {
        get() {
            const distinct = (value, index, self) => {
                return self.indexOf(value) === index;
            }

            const success = result => {
                this.list = result.data.data;
            };

            const error = _ => this.isError = true;

            this.$http({ url: 'emails', method: 'GET'}).then(success, error);
        }, 
        onDeleteClick(id) {

            const isConfirmed = confirm("Are you sure?");

            const success = result => {
                this.get();
            };

            const error = _ => this.isError = true;

            if (isConfirmed) {
                this.$http({ url: `emails/${id}`, method: 'DELETE'}).then(success, error);
            }
        }
    },
    mounted() {
        this.get();
    }
}
</script>
<template>
    <div>
        <nav-admin></nav-admin>
        <div class="container">
            <div class="row mt-4 mb-2">
                <div class="col-12">
                    <h2 class="h2">Photos</h2>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-12 col-md-6">
                    <button class="btn btn-primary" v-on:click="synchronize">Synchronize list</button>
                </div>
                <div class="col-12 col-md-6">
                    <b-pagination
                     align="right"
                     v-model="current_page"
                     :total-rows="rows"
                     :per-page="per_page"
                     aria-controls="photos"
                    ></b-pagination>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <b-table
                     id="photos"
                     :items="photos"
                     :fields="fields"
                     :per-page="per_page"
                     :current-page="current_page"
                    >
                        <template v-slot:cell(id)="data">
                            {{ data.value }}
                        </template>
                        <template v-slot:cell(thumbnail_url)="data">
                            <img :src="data.value" :alt="data.item.instagram_photo_id">
                        </template>
                        <template v-slot:cell(is_hidden)="data">
                            <input type="checkbox" v-model="data.item.is_hidden" v-on:change="changeVisibility(data.item.id)">
                        </template>
                        <template v-slot:cell(actions)="data">
                            <button class="btn btn-danger float-right" v-on:click="deletePhoto(data.item.id)">Delete</button>
                        </template>
                    </b-table>
                </div> 
                <div class="col-12">
                    <b-pagination
                     align="center"
                     v-model="current_page"
                     :total-rows="rows"
                     :per-page="per_page"
                     aria-controls="photos"
                    ></b-pagination>
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
                current_page: 1,
                per_page: 20, 
                has_error: false,
                errors:[],
                fields: [
                    { key: 'id', label: 'Id'},
                    { key: 'thumbnail_url', label: 'Photo' },
                    { key: 'is_hidden', label: 'Hidden' },
                    { key: 'actions', label: '' }
                ],
                photos: []
            }
        },
        mounted() {
            this.getPhotos();
        },
        methods: {
            getPhotos() {
                this.$http({ url: 'photos-all', method: 'GET'})
                    .then(
                        (res) => {
                            this.photos = res.data.data.reverse();
                        },
                        () => this.has_error = true
                    );
            },
            synchronize() {
                let self = this;
                this.$http({ url: 'synchronize', method: 'GET'}).then(
                        (res) => self.getPhotos(),
                        () => this.has_error = true
                    );
            },
            changeVisibility(id) {
                this.$http({ url: 'photo-change-visibiliety/'+ id, method: 'PUT'});
            },
            deletePhoto(id) {
                const is_confirmed = confirm('Are you sure?');
                if (is_confirmed) {
                    this.$http({ url: 'photo/'+ id, method: 'DELETE'})
                        .then(() => this.getPhotos());
                }
            }
        },
        components: {
            navAdmin
        },
        computed: {
            rows() {
                return this.photos.length;
            }
        }
    }
</script>
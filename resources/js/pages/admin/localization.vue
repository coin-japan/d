<template>
    <div>
        <nav-admin></nav-admin>
         <div class="container">
            <h2 class="h2 pt-2 pb-1">Localization</h2>
            <div class="row mb-1 mt-2">
                <div class="col-12 col-md-6">
                    <b-dropdown :text="locale">
                        <b-dropdown-item v-on:click="changeLang(lag)" v-for="(lag, key) in locales" v-bind:key="key">{{ lag }}</b-dropdown-item>
                    </b-dropdown>
                </div>
                <div class="col-12 col-md-6">
                    <b-pagination
                     align="right"
                     v-model="current_page"
                     :total-rows="rows"
                     :per-page="per_page"
                     aria-controls="strings"
                    ></b-pagination>
                </div>
            </div>
            <div v-if="isError" class="alert alert-danger">
                Internal server error
            </div>
            <b-table
             id="strings"
             :items="strings"
             :fields="fields"
             :per-page="per_page"
             :current-page="current_page"
            >
                <template v-slot:cell(id)="data">
                    {{ data.value }}
                </template>
                <template v-slot:cell(page_index)="data">
                    {{ data.value }}
                </template>
                <template v-slot:cell(section_index)="data">
                    {{ data.value }}
                </template>
                <template v-slot:cell(text)="data">
                    {{ data.value }}
                </template>
                <template v-slot:cell(action)="data">
                    <b-button v-on:click="updateItem(data.item)" v-b-modal.update-string class="btn btn-primary float-right">Update</b-button>
                </template>

            </b-table>
            <div class="row">
                <div class="col-12">
                    <b-pagination
                     align="center"
                     v-model="current_page"
                     :total-rows="rows"
                     :per-page="per_page"
                     aria-controls="strings"
                    ></b-pagination>
                </div>
            </div>
        </div>
        <editor v-if="currItem" :resourceItem="currItem"></editor>  
    </div>
</template>
<script>
import navAdmin from './../../components/nav-admin';
import editor from './../../components/admin/locale-edit';
export default {
    data() {
        return {
            isError: false,
            locale: null,
            locales: [],
            resources: [],
            strings: [],
            currItem: null,
            current_page: 1,
            per_page: 10, 
            fields: [
                { key: 'id', label: 'Id'},
                { key: 'page_index', label: 'Page' },
                { key: 'section_index', label: 'Section' },
                { key: 'text', label: 'Text' },
                { key: 'action', label: '' }
            ],
        }
    },
    components: {
        navAdmin,
        editor
    },
    methods: {
        get() {
            const distinct = (value, index, self) => {
                return self.indexOf(value) === index;
            }
            const success = result => {
                this.resources = result.data.data;
                this.locales = this.resources.map(r => r.locale_index).filter(distinct);
                this.locale = this.locales[0];
                this.changeLang(this.locale);
            };

            const error = _ => this.isError = true;

            this.$http({ url: 'strings', method: 'GET'}).then(success,error);
        }, 
        changeLang(locale) {
            this.locale = locale;
            this.strings = this.resources.filter(r => r.locale_index === locale); 
        }, 
        updateItem(item) {
            this.currItem = null;
            this.currItem = item;
        }
    },
    mounted() {
        this.get();
    },
    computed: {
        rows() {
            return this.strings.length;
        }
    }
}
</script>
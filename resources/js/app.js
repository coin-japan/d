import 'es6-promise/auto';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-vue/dist/bootstrap-vue.css'
import BootstrapVue from 'bootstrap-vue'
import axios from 'axios';
import Vue from 'vue';
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import index from './index';
import auth from './auth';
import router from './router';
import Tabs from 'vue-tabs-component';
import { i18n } from './i18n';
import cookies from 'vue-cookies';
import VueLazyload from 'vue-lazyload';

window.Vue = Vue;

Vue.router = router;
Vue.use(VueRouter);

Vue.use(VueAxios, axios);
axios.defaults.baseURL = '/api';
Vue.use(VueAuth, auth);

var VueScrollactive = require('vue-scrollactive');
Vue.use(VueScrollactive);

Vue.use(Tabs);

Vue.component('index', index);

var VueTouch = require('vue-touch');
Vue.use(VueTouch, {name: 'v-touch'});

Vue.use(BootstrapVue);
Vue.use(cookies);
Vue.use(VueLazyload);

const app = new Vue({
    el: '#app',
    router,
    i18n,
    retnder: () => h(App)
});

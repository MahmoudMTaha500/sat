/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue';
// Import Bootstrap an BootstrapVue CSS files (order is important)
// import 'bootstrap/dist/css/bootstrap.css';
// import 'bootstrap-vue/dist/bootstrap-vue.css';
Vue.use(BootstrapVue);
require('./bootstrap');

window.Vue = require('vue');

Vue.use(require('vue-resource'));
Vue.component('pagination', require('laravel-vue-pagination'));


import CountryCityComponent from './components/CountryCityComponent';
import CitiesComponent from './components/city/CitiesComponent';
import institutesComponent from './components/institute/institutesComponent';
import startdateComponent from './components/startdate/startdateComponent';
import BlogIndexComponent from './components/blog/BlogIndexComponent.vue';


const app = new Vue({
    el: '#sat_app_vue',
    components: {
        CountryCityComponent,
        CitiesComponent,
        institutesComponent,
        startdateComponent,
        BlogIndexComponent
    }
});
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


 import Vue from 'vue';
 import rate from 'vue-rate';
 import 'vue-rate/dist/vue-rate.css';
 Vue.use(rate);
 require('./bootstrap');
 
 window.Vue = require('vue');
 
 Vue.component('pagination', require('laravel-vue-pagination'));
 

 import CityComponent from "./components/website/CityComponent.vue";
 import CountryComponent from "./components/website/CountryComponent.vue";
 import CoursePriceInfoComponent from "./components/website/CoursePriceInfoComponent.vue";
 import InstitutesPgaeComponent from "./components/website/InstitutesPgaeComponent.vue";
 import SearchComponent from "./components/website/SearchComponent.vue";
 
 
 
 const app = new Vue({
     el: '#sat_app_vue',
     components: {
         CityComponent,
         CountryComponent,
         CoursePriceInfoComponent,
         InstitutesPgaeComponent,
         SearchComponent,
     }
 });
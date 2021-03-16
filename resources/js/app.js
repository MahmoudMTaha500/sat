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

Vue.use(require('vue-resource'));
Vue.component('pagination', require('laravel-vue-pagination'));


import CountryCityComponent from './components/CountryCityComponent';
import CountryCityBlogComponent from './components/country_city_blog/CountryCityBlogComponent.vue';
import CitiesComponent from './components/city/CitiesComponent';
import institutesComponent from './components/institute/institutesComponent';
import CommentComponent from './components/comment/CommentComponent';
import CommentBlogComponent from './components/comment/CommentBlogComponent';
import RateComponent from './components/rate/RateComponent';
import startdateComponent from './components/startdate/startdateComponent';
import BlogIndexComponent from './components/blog/BlogIndexComponent.vue';
import coursesComponent from "./components/course/coursesComponent.vue";
import CityComponent from "./components/website/CityComponent.vue";
import CountryComponent from "./components/website/CountryComponent.vue";
import ShowImagesComponent from "./components/ShowImagesComponent.vue";
import InsuranceComponent from "./components/insurance/InsuranceComponent.vue";
import AirportComponent from "./components/airport/AirportComponent.vue";
import ResidenceComponent from "./components/residence/ResidenceComponent.vue";
import InstitutesPgaeComponent from "./components/website/InstitutesPgaeComponent.vue";
import StudentComponent from "./components/student/StudentComponent.vue";
import SuccesStoryComponent from "./components/student/SuccesStoryComponent.vue";

const app = new Vue({
    el: '#sat_app_vue',
    components: {
        CountryCityComponent,
        CitiesComponent,
        institutesComponent,
        startdateComponent,
        CommentComponent,
        RateComponent,
        BlogIndexComponent,
        coursesComponent,
        CountryCityBlogComponent,
        CommentBlogComponent,
        ShowImagesComponent,
        InsuranceComponent,
        AirportComponent,
        ResidenceComponent,
        CityComponent,
        CountryComponent,
        InstitutesPgaeComponent,
        StudentComponent,
        SuccesStoryComponent

    }
});
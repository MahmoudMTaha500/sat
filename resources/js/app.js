/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import CountryCityComponent from './components/CountryCityComponent';
import CitiesComponent from './components/city/CitiesComponent';
import institutesComponent from './components/institute/institutesComponent';

const app = new Vue({
    el: '#sat_app_vue',
    components: {
        CountryCityComponent,
        CitiesComponent,
        institutesComponent,
    }
});
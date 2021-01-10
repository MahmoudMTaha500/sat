/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import TestComponent from './components/TestComponent';
import CitiesComponent from './components/city/CitiesComponent';

const app = new Vue({
    el: '#app',
    components: {
        TestComponent,
        CitiesComponent,
    }
});

export default {
    components: {
        "city-component": CitiesComponent
    },
    // ...
}
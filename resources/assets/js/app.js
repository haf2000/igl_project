
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

//window.Vue = require('vue');
import Vue from 'vue';
import vuetify from "./plugins/vuetify";
import App from './App.vue';
import router from './router'

 Vue.component('Navbar', require('./components/Navbar.vue'));


const app = new Vue({
    vuetify,
    router,
    render: h => h(App),
    el: '#app'
});

/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';

import Vue from 'vue';
import {BootstrapVue, IconsPlugin} from "bootstrap-vue";

import axios from "axios";
window.axios = axios;

Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-vue/dist/bootstrap-vue.min.css';

import App from './components/App';
import Navigation from './components/Navigation';
import Login from "./components/attemp/Login";

import Vuetify from "./js/plugins/vuetify";

new Vue({
    el: "#app",
    components: {
        App,
        Navigation,
        Login
    },
    vuetify: Vuetify,
})

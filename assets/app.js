import './styles/app.css';
import './bootstrap';

import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-vue/dist/bootstrap-vue.min.css';

import Vue from 'vue';
import VueRouter from "vue-router";
import {BootstrapVue, IconsPlugin} from "bootstrap-vue";
import axios from "axios";

window.axios = axios;
Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(IconsPlugin);

import Vuetify from './plugins/vuetify';
import router from './router';
import vueComponents from "./vueComponents";

new Vue({
    el: "#app",
    vuetify: Vuetify,
    router: router,
    components: {
        Navigation: vueComponents.Navigation,
    }
});


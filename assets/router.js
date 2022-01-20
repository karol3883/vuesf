
import vueComponents from "./vueComponents";
import VueRouter from "vue-router";

const routes = [
    { path: '/', component: vueComponents.Home, name: 'home' },
    { path: '/test', component: vueComponents.Home, name: 'a1' },
    { path: '/login', component: vueComponents.Login, name: 'a1' },
];

export default new VueRouter({
    mode: 'history',
    base: '/app/',
    routes
})
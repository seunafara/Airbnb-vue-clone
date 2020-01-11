/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

window.Vue = require("vue");



import VueRouter from "vue-router";

Vue.use(VueRouter);

// import components
import Home from "./components/Home";
import Explore from "./components/Explore";
import AddProperty from "./components/AddProperty";
import Profile from "./components/Profile";
import NotFound from "./components/NotFound";
const routes = [
    { path: "/dashboard", component: Home },
    { path: "/home", component: Home },
    { path: "/explore", component: Explore },
    { path: "/addproperty", component: AddProperty },
    { path: "/profile", component: Profile },
    { path: "*", component: NotFound }
];

const router = new VueRouter({
    mode: "history",
    routes // short for `routes: routes`
});

// vueprogressbar
import VueProgressBar from 'vue-progressbar'

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '7px'
})

// sweet alert url - https://sweetalert2.github.io/#download
import swal from "sweetalert2";
window.swal = swal;

import Swalla from "sweetalert2";
window.Swalla = Swalla;

const toast = swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: toast => {
        toast.addEventListener("mouseenter", swal.stopTimer);
        toast.addEventListener("mouseleave", swal.resumeTimer);
    }
});
window.toast = toast;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

Vue.component(
    "loader-component",
    require("./components/loader.vue").default
);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// vform
import { Form, HasError, AlertError } from "vform";
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
window.Form = Form;


const app = new Vue({

    el: "#app",
    router
});

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import { ValidationProvider, extend } from 'vee-validate';
import { required } from 'vee-validate/dist/rules';

extend('required', {
    ...required,
    message: 'This field is required'
});

// Vue.component('ValidationProvider', ValidationProvider);
//
// import { ValidationProvider } from 'vee-validate';
// import { extend } from 'vee-validate';
//
// extend('positive', value => {
//     if (value >= 0) {
//         return true;
//     }
//
//     return 'The {_field_} field must be a positive number';
// });
/*
<validation-provider name="numero" rules="positive" v-slot="v">
    <input v-model="value" type="text">
    <span> @{{ v.errors[0] }}</span>
</validation-provider>*/

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data:{
        value: '',
    }
});

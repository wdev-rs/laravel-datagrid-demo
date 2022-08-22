import './bootstrap';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

require('./vendor/laravel-datagrid/laravel-datagrid');

import Vue from 'vue'
//
// import DataGrid from "./vendor/laravel-datagrid/components/DataGrid";
// Vue.component('data-grid', DataGrid);

// window.Swal = require('sweetalert2/dist/sweetalert2.all');

const el = document.getElementById('app')

if (el) {
    new Vue().$mount(el)
}



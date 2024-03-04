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

import {createApp} from 'vue'

// import './vendor/laravel-datagrid/gridjs/laravel-datagrid';
import DataGrid from "./vendor/laravel-datagrid/datagrid/Components/DataGrid.vue";

const app = createApp({});

app.config.compilerOptions.whitespace = 'condense';

app.component('data-grid', DataGrid);
app.mount('#app')



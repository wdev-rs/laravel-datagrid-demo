import './bootstrap';
import '../css/app.css';

import {createApp} from 'vue'

import DataGridWrapper from "./Components/DataGridWrapper.vue";
import DataGrid from "./vendor/laravel-datagrid/gridjs/Components/DataGrid.vue";

const app = createApp({});

app.config.compilerOptions.whitespace = 'condense';

app.component('data-grid-wrapper', DataGridWrapper);
app.component('data-grid-gridjs', DataGrid);
app.mount('#app')



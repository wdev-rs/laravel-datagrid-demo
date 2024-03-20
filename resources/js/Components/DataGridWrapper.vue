<script setup>
    import DataGrid from './../vendor/laravel-datagrid/datagrid/Components/DataGrid.vue'
    import {onMounted, reactive, ref} from "vue";
    import {ServerConfig} from "../vendor/laravel-datagrid/datagrid/ServerConfig";
    import InputLabel from "../vendor/laravel-datagrid/datagrid/Components/InputLabel.vue";
    import PrimaryButton from "../vendor/laravel-datagrid/datagrid/Components/PrimaryButton.vue";
    import SecondaryButton from "../vendor/laravel-datagrid/datagrid/Components/SecondaryButton.vue";
    import TextInput from "../vendor/laravel-datagrid/datagrid/Components/TextInput.vue";

    const props = defineProps({
        columns: Array,
        rows: Object,
    });

    const alert = (text) => {
        window.alert(text);
    }

    const dataColumns = ref(props.columns);
    const dataRows = ref(props.rows);

    const customFilteringEnabled = ref(false);

    const filters = ref({
        name: '',
        code: ''
    });

    const server = new ServerConfig();

    const filter = () => {
        const params = server.params();
        params.delete('search');
        params.delete('page');
        params.delete('limit');

        params.set('filters[name]', filters.value.name);
        params.set('filters[code]', filters.value.code)

        server.get(params).then((data) => {
            dataRows.value = data;
        });
    };

    const reset = () => {
        filters.value = {
            name: '',
            code: ''
        };

        const params = server.params();
        params.delete('filters[name]');
        params.delete('filters[code]');
        params.delete('page');
        params.delete('limit');

        server.get(params).then((data) => {
            dataRows.value = data;
        });
    }
</script>

<template>

    <label class="p-3 bg-white rounded text-slate-600" for="">
        <input type="checkbox" v-model="customFilteringEnabled">
        Custom filtering enabled
    </label>

    <data-grid
        :columns="dataColumns"
        :rows="dataRows"
        :mass-actions="[{'action' : 'massDelete', 'label': 'Delete'}]"
        @massDelete="(selectedIds) => alert('Simulating mass delete on id(s): ' + selectedIds.join(','))"
    >
        <template v-if="customFilteringEnabled" #filters>
            <form  class="p-3 mb-6 rounded bg-gray-50" @submit.prevent="filter">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="mx-1">
                        <InputLabel>Name</InputLabel>
                        <TextInput
                            id="name"
                            v-model="filters.name"
                            type="text"
                            class="block w-full mt-1"
                        />
                    </div>
                    <div class="mx-1">
                        <InputLabel>Code</InputLabel>
                        <TextInput
                            id="name"
                            v-model="filters.code"
                            type="text"
                            class="block w-full mt-1"
                        />
                    </div>
                </div>
                <div class="mt-5 mb-2 ml-1 flex">
                    <PrimaryButton>
                        Search
                    </PrimaryButton>
                    <SecondaryButton class="mx-3" @click="reset">
                        Reset
                    </SecondaryButton>
                </div>
            </form>
        </template>
    </data-grid>
</template>

<style scoped>

</style>

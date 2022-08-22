import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
// import react from '@vitejs/plugin-react';
import vue from '@vitejs/plugin-vue2';

export default defineConfig({
    plugins: [
        laravel([
            'resources/css/app.css',
            'resources/js/app.js',
        ]),
        // react(),
        vue(),
    ],
    resolve: {
        alias: {
            '@': '/resources/js',
            'vue': 'vue/dist/vue.esm.js'
        }
    }
});

// vite.config.js

import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                'app/Http/Livewire/**',
            ],
        }),
        vue(), // Ensuring Vue plugin is added to the config
    ],

    css: {
        preprocessorOptions: {
            scss: {
                additionalData: `@import "~@/styles/global.scss";` // Global SCSS imports
            }
        }
    },
});

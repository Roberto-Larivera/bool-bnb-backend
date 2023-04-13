import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
const path = require('path');


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                // 'resources/scss/partials/mixin.scss',
                // 'resources/scss/partials/reset.scss',
                // 'resources/scss/partials/variables.scss',
                // 'resources/scss/admin/appLayout.scss',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
            '~fontawesome': path.resolve(__dirname, 'node_modules/@fortawesome'),
            '~resources': '/resources/'
        }
    }
});

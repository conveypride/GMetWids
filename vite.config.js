import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/css/index.css',
                'resources/css/home.css',
                'resources/css/adminPortal.css',
                'resources/css/adminIndex.css',
                'resources/js/app.js',
                'resources/js/index.js',
                'resources/js/home.js',
                'resources/js/adminApp.js',
                'resources/js/adminCharts-demo.js',
                'resources/js/adminIndex-charts.js',
            ],
            // refresh: true,
        }),
    ],
    // resolve: {
    //     alias: {
    //         '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
    //     }
    // },


});

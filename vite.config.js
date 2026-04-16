import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    
    build: {
        chunkSizeWarningLimit: 500,
        minify: 'terser',
        rollupOptions: {
            output: {
                manualChunks: {
                    'alpine': ['alpinejs'],
                    'http': ['axios'],
                },
            },
        },
    },
});

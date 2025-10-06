import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/login.css',
                'resources/css/style.css'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: '0.0.0.0',  // escucha desde fuera del contenedor
        port: 5173,
        strictPort: true,
        hmr: {
            host: 'localhost', // o la IP de tu máquina host si no funciona localhost
            port: 5173,
        },
    },
});

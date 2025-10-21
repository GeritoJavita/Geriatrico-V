import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/login/login.css',
                'resources/css/style.css',
                'resources/js/login/User_register.js',
                'resources/css/producto/producto_create.css',
                'resources/css/inventario/inventario.css',
                'resources/css/dashboard/dashboard.css',
                'resources/js/login/login.js',
<<<<<<< HEAD
                'resources/js/producto/inventario.js',
=======
                'resources/css/factura/factura.css'
>>>>>>> 087a9160350cdb8d910b5238f8a14ec7427238e5
            ],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',
        port: 5173,
        strictPort: true,
        hmr: {
            host: 'localhost',
            port: 5173,
        },
    },
});

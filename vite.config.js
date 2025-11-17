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
                'resources/css/inventario/inventario.css',
                'resources/css/dashboard/dashboard.css',
                'resources/js/login/login.js',
                'resources/js/producto/inventario.js',
                'resources/css/factura/factura.css',
                'resources/js/proveedor/proveedor_edit.js',
                'resources/css/create/form_create.css',
                'resources/js/proveedor/proveedor_register.js',
                'resources/js/producto/producto_regist.js',
                'resources/js/residente/residente_register.js',
                'resources/js/residente/residente_search.js',
                
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

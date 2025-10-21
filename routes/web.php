<?php

use App\Http\Controllers\users\LoginController;
use App\Http\Controllers\users\Register_userController;
use App\Http\Controllers\dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\ProveedorController;
use App\Models\Proveedor;

// Ruta para mostrar index principal
Route::get('/', function () {
    return view('index');
})->name('home');


// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación solo por usuarios logeados
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard_admin', [DashboardController::class, 'dashboard_admin'])->name('dashboard_admin');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');
    Route::resource('inventario', InventarioController::class);
    Route::resource('producto', ProductoController::class);
    Route::resource('factura', FacturaController::class);
    Route::resource('proveedor', ProveedorController::class);

    
});

 
Route::post('/login_user', [LoginController::class, 'login'])->name('login_De_usuarios');

Route::post('/Actualizar_pro', [ProductoController::class, 'actualizar_producto'])->name('actualizar_producto');

Route::get('/login', [LoginController::class, 'logins'])->name('login');

Route::get('/User_register', [LoginController::class, 'User_register'])->name('User_register');

Route::post('/Send_register', [Register_userController::class, 'send_register'])->name('send_register');

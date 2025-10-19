<?php

use App\Http\Controllers\users\LoginController;
use App\Http\Controllers\users\Register_userController;
use App\Http\Controllers\dashboard\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProductoController;


// Ruta para mostrar index principal
Route::get('/', function () {
    return view('index');
})->name('home');


// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación solo por usuarios logeados
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');
    Route::resource('producto', ProductoController::class);
});

Route::post('/login_user', [LoginController::class, 'login'])->name('login_De_usuarios');

Route::get('/login', [LoginController::class, 'logins'])->name('login');

Route::get('/User_register', [LoginController::class, 'User_register'])->name('User_register');

Route::post('/Send_register', [Register_userController::class, 'send_register'])->name('send_register');





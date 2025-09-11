<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Ruta para mostrar formulario de login
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para procesar login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Ruta para mostrar index principal
Route::get('/', function () {return view('index'); })->name('home');
// Ruta para mostrar formulario de login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Ruta para procesar login
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas por autenticación solo por usuarios logeados
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
});

Route::get('/logins', [AuthController::class,'logins'])->name('logins');

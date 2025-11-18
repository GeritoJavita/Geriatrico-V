<?php

use App\Http\Controllers\users\LoginController;
use App\Http\Controllers\users\Register_userController;
use App\Http\Controllers\dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    InventarioController,
    ProductoController,
    FacturaController,
    ProveedorController,
    CategoriaProductoController,
    AlergiaController,
    PatologiaController,
    SignosVitalesController,
    HistoriaClinicaController,
    ResidenteController,
    EmpleadoController,
    FamiliarController,
    QuejaNovedadController,
    ResumenAtencionController,
    MedicamentoResidenteController,
    DetalleProductoController
};


// Ruta para mostrar index principal
Route::get('/', function () {
    return view('index');
})->name('home');


// Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login_user', [LoginController::class, 'login'])->name('login_De_usuarios');

Route::post('/Actualizar_pro', [ProductoController::class, 'actualizar_producto'])->name('actualizar_producto');

Route::get('/login', [LoginController::class, 'logins'])->name('login');

Route::get('/User_register', [LoginController::class, 'User_register'])->name('User_register');

Route::post('/Send_register', [Register_userController::class, 'send_register'])->name('send_register');

// Rutas protegidas por autenticación solo por usuarios logeados
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard_admin', [DashboardController::class, 'dashboard_admin'])->middleware('can:dashboard_admin')->name('dashboard_admin');
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware('can:dashboard_admin')->name('dashboard');

    // Resources - Cada uno crea automáticamente: index, create, store, show, edit, update, destroy
    Route::resource('inventario', InventarioController::class)->middleware('can:dashboard_admin');
    Route::resource('producto', ProductoController::class)->middleware('can:dashboard_admin');
    Route::resource('factura', FacturaController::class)->middleware('can:dashboard_admin');
    Route::resource('proveedor', ProveedorController::class)->middleware('can:dashboard_admin');
    Route::resource('categoria_producto', CategoriaProductoController::class)->middleware('can:dashboard_admin');
    Route::resource('alergia', AlergiaController::class)->middleware('can:dashboard_admin');
    Route::resource('patologia', PatologiaController::class)->middleware('can:dashboard_admin');
    Route::resource('signos_vitales', SignosVitalesController::class)->middleware('can:dashboard_admin');
    Route::resource('historia_clinica', HistoriaClinicaController::class)->middleware('can:dashboard_admin');
    Route::resource('residente', ResidenteController::class)->middleware('can:dashboard_admin');
    //Ruta personalizada adicional
    Route::get('residente/{id}/signos_create', 
    [ResidenteController::class, 'signos_create']
)->name('residente.signos_create')->middleware('can:dashboard_admin');


    Route::resource('empleado', EmpleadoController::class)->middleware('can:dashboard_admin');
    Route::resource('familiar', FamiliarController::class)->middleware('can:dashboard_admin');
    Route::resource('queja_novedad', QuejaNovedadController::class)->middleware('can:dashboard_admin');
    Route::resource('resumen_atencion', ResumenAtencionController::class)->middleware('can:dashboard_admin');
    Route::resource('medicamento_residente', MedicamentoResidenteController::class)->middleware('can:dashboard_admin');
    Route::resource('detalle_producto', DetalleProductoController::class)->middleware('can:dashboard_admin');
    // Ruta personalizada adicional
    Route::post('/Actualizar_pro', [ProductoController::class, 'actualizar_producto'])->name('actualizar_producto');
});

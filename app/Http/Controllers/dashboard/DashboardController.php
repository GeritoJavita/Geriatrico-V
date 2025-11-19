<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Services\ResidenteService;
use App\Services\EmpleadoService;
use App\Services\ProveedorService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard_admin(
    ResidenteService $residenteService,
    EmpleadoService $empleadoService,
    ProveedorService $proveedorService
) {
    return view('layouts..admin', [
        'totalPacientes' => $residenteService->count(),
        'totalEmpleados' => $empleadoService->count(),
        'habitacionesOcupadas' => 12,
        'controlesHoy' => 4,
        'totalProveedores' =>$proveedorService->count()
    ]);
}

}

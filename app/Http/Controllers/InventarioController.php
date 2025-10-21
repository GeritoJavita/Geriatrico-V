<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InventarioService;

class InventarioController extends Controller
{
    protected $inventarioService;

    public function __construct(InventarioService $inventarioService)
    {
        $this->inventarioService = $inventarioService;
    }

    public function index(Request $request)
    {
        $search = $request->get('search');
        $data = $this->inventarioService->listar($search);

        return view('inventario', [
            'productos' => $data['productos'],
            'inventarios' => $data['inventarios'],
        ]);
    }
}

<?php

namespace App\Repositories;

use App\Models\Usuario;

class UserRepository
{
    public function findByCorreo(string $correo)
    {
        return Usuario::where('correo', $correo)->first();
    }

    public function getAll()
    {
        return Usuario::with('rol')->get();
    }
}

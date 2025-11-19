<?php

namespace App\Repositories;

use App\Models\Usuario;

class UsuarioRepository
{
    public function getAll()
    {
       // return Usuario::with(['empleados'])->get();
        return Usuario::all();
    }

    public function findById($id)
    {
        return Usuario::find($id);
    }

    public function create(array $data)
    {
        return Usuario::create($data);
    }

    public function update($id, array $data)
    {
        $Usuario = $this->findById($id);
        if ($Usuario) {
            $Usuario->update($data);
            return $Usuario;
        }
        return null;
    }

    public function destroy($id)
    {
        $Usuario = $this->findById($id);
        if ($Usuario) {
            $Usuario->delete();
            return true;
        }
        return false;
    }

   /* public function search($search)
    {
        return Usuario::with(['empleados'])
            ->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%$search%")
                  ->orWhere('apellido', 'like', "%$search%")
                  ->orWhere('id', $search)
                  ->orWhere('telefono', 'like', "%$search%")
                  ->orWhere('direccion', 'like', "%$search%")
                  ->orWhere('contraseña', 'like', "%$search%");
            })
            ->get();
    }*/ public function search($search)
    {
        return Usuario::with(['empleados'])
            ->where('nombre', 'like', "%$search%")
            ->orWhere('apellido', 'like', "%$search%")
            ->orWhere('id', $search)
            ->orWhere('telefono', 'like', "%$search%")
            ->orWhere('direccion', 'like', "%$search%")
            ->orWhere('contraseña', 'like', "%$search%")
            ->get();
    } 
}

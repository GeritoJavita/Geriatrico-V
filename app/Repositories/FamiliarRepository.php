<?php

namespace App\Repositories;

use App\Models\Familiar;

class FamiliarRepository
{
    public function getAll()
    {
        return Familiar::with(['residentes', 'quejas'])->get();
    }

    public function findById($id)
    {
        return Familiar::find($id);
    }

    public function create(array $data)
    {
        return Familiar::create($data);
    }

    public function update($id, array $data)
    {
        $familiar = $this->findById($id);
        if ($familiar) {
            $familiar->update($data);
            return $familiar;
        }
        return null;
    }

    public function destroy($id)
    {
        $familiar = $this->findById($id);
        if ($familiar) {
            $familiar->delete();
            return true;
        }
        return false;
    }

    public function search($search)
    {
        return Familiar::with(['residentes', 'quejas'])
            ->where(function ($q) use ($search) {
                $q->where('nombre', 'like', "%$search%")
                  ->orWhere('apellido', 'like', "%$search%")
                  ->orWhere('id', $search)
                  ->orWhere('correo', 'like', "%$search%")
                  ->orWhere('telefono', 'like', "%$search%");
            })
            ->get();
    }
}

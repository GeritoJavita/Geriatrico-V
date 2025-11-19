<?php

namespace App\Services;

use App\Repositories\UsuarioRepository;

class UsuarioService
{
    protected $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    public function listarUsuario()
    {
        return $this->usuarioRepository->getAll();
    }

    public function crearUsuario(array $data)
    {
        return $this->usuarioRepository->create($data);
    }

    public function actualizarUsuario($id, array $data)
    {
        return $this->usuarioRepository->update($id, $data);
    }

    public function eliminarUsuario($id)
    {
        return $this->usuarioRepository->destroy($id);
    }

    public function listar($search = null)
    {
        return $search
            ? $this->usuarioRepository->search($search)
            : $this->usuarioRepository->getAll();
    }
}

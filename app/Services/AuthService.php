<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function login(array $credentials)
    {
        $usuario = $this->userRepository->findByCorreo($credentials['correo']);

        if ($usuario && Hash::check($credentials['clave'], $usuario->clave)) {
            Auth::login($usuario);
            return true;
        }

        return false;
    }

    public function logout()
    {
        Auth::logout();
    }
}

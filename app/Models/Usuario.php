<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario'; // 👈 tu tabla se llama en singular

    protected $primaryKey = 'id';
    public $incrementing = false; // 👈 porque usas IDs grandes como 1000808113
    protected $keyType = 'int';

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'correo',
        'direccion',
        'clave',
        'rol_id',
    ];

    protected $hidden = [
        'clave',
        'remember_token',
    ];

    // 👇 Esta línea es *vital* para que Auth use la columna correcta
    public function getAuthPassword()
    {
        return $this->clave;
    }
}

<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'usuario'; 

    protected $primaryKey = 'id';
    public $incrementing = false; // IDs grandes como 1000808113
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

    //  *vital* para que Auth use la columna correcta
    public function getAuthPassword()
    {
        return $this->clave;
    }
}

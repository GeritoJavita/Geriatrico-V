<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

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
    ];

    protected $hidden = [
        'clave',
        'remember_token',
    ];
   
    public function getAuthPassword()
    {
        return $this->clave;
    }
}

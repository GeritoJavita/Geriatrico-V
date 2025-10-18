<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuarios';
    protected $fillable = [
        'nombre',
        'apellido',
        'correo',
        'direccion',
        'clave',
        'rol_id'
    ];

    protected $hidden = [
        'clave',
    ];

    // Sobrescribimos la columna de contraseña para que Laravel use 'clave'
    public function getAuthPassword()
    {
        return $this->clave;
    }

    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rol_id');
    }
}

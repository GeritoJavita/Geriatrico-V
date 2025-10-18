<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    protected $fillable = ['id','nombre', 'apellido', 'correo', 'direccion', 'clave', 'rol_id'];
    public $timestamps = true;
}

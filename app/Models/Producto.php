<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaProducto;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos'; // nombre de la tabla
    protected $fillable = [
        'nombre',
        'precio',
        'fecha_caducidad',
        'dosis',
        'indicaciones',
        'lote',
        'presentacion',
        'categoria_id',
        'proveedor_id'
    ];

    // Relación con proveedor
    /*public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'proveedor_id');
    }*/
    
    public function inventario()
{
    return $this->hasOne(Inventario::class, 'id_producto');
}


    }

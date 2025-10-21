<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;

    protected $table = 'factura';

    protected $fillable = [
        'precio',
        'nombre',
        'fecha',
        'tipo',
        'ruta',
    ];

    public function detalles()
    {
        return $this->hasMany(DetalleProducto::class, 'id_factura');
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalle_producto', 'id_factura', 'id_producto')
                    ->withPivot('subtotal')
                    ->withTimestamps();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoServicio extends Model
{
    protected $table = 'productos_servicios'; // Nombre exacto de tu tabla

    protected $fillable = [
        'negocio_id', 'categoria_id', 'nombre', 
        'tipo', 'descripcion', 'precio', 'esta_activo'
    ];

    public function negocio()
    {
        return $this->belongsTo(Negocio::class);
    }

    public function categoria()
    {
        return $this->belongsTo(CategoriaNegocio::class, 'categoria_id');
    }

    public function imagenes()
    {
        return $this->hasMany(ImagenProducto::class, 'producto_id');
    }
}
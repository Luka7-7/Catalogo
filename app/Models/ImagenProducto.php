<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImagenProducto extends Model
{
    protected $table = 'imagenes_productos';
    public $timestamps = false; // Solo tienes creado_el

    protected $fillable = ['producto_id', 'ruta_imagen', 'es_principal', 'creado_el'];

    public function producto()
    {
        return $this->belongsTo(ProductoServicio::class);
    }
}
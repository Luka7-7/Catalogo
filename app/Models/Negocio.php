<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    // Laravel buscará la tabla "negocios" automáticamente
    protected $fillable = [
        'user_id', 'nombre', 'slug', 'descripcion', 
        'categoria_manual', 'ubicacion', 'ruta_logo', 
        'enlace_whatsapp', 'url_facebook', 'url_instagram', 'url_tiktok'
    ];

    // Un negocio pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Un negocio tiene muchos productos
    public function productos()
    {
        return $this->hasMany(ProductoServicio::class, 'negocio_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaNegocio extends Model
{
    protected $table = 'categorias_negocio'; // Nombre exacto de tu tabla
    public $timestamps = false; // Tu tabla no tiene created_at/updated_at

    protected $fillable = ['nombre_categoria'];

    public function productos()
    {
        return $this->hasMany(ProductoServicio::class, 'categoria_id');
    }
}
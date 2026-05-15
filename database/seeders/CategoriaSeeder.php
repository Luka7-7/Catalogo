<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
        ['nombre_categoria' => 'Gastronomía'],
        ['nombre_categoria' => 'Belleza y Cuidado Personal'],
        ['nombre_categoria' => 'Moda y Accesorios'],
        ['nombre_categoria' => 'Salud y Bienestar'],
        ['nombre_categoria' => 'Servicios para el Hogar'],
        ['nombre_categoria' => 'Tecnología'],
        ['nombre_categoria' => 'Mascotas'],
        ['nombre_categoria' => 'Arte y Diseño'],
        ['nombre_categoria' => 'Educación'],
    ];

    foreach ($categorias as $cat) {
        DB::table('categorias_negocio')->insert($cat);
    }
    }
}

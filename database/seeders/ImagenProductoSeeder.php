<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagenProductoSeeder extends Seeder
{
    public function run(): void
    {
        // Obtenemos todos los IDs de los productos actuales
        $productosIds = DB::table('productos_servicios')->pluck('id')->toArray();

        foreach ($productosIds as $id) {
            // Insertamos una imagen principal para cada producto
            DB::table('imagenes_productos')->insert([
                'producto_id' => $id,
                // Usamos un servicio de imágenes aleatorias (200x200 píxeles)
                'ruta_imagen' => 'https://picsum.photos/400/400?random=' . $id,
                'es_principal' => true,
                'creado_el' => now(),
            ]);

            // Opcional: Agregar una segunda imagen de galería a algunos productos
            if (rand(0, 1)) {
                DB::table('imagenes_productos')->insert([
                    'producto_id' => $id,
                    'ruta_imagen' => 'https://picsum.photos/400/400?random=' . ($id + 100),
                    'es_principal' => false,
                    'creado_el' => now(),
                ]);
            }
        }
    }
}
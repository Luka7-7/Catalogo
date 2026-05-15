<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class NegocioSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('es_ES'); // Usamos español
        
        // Obtenemos los IDs de las categorías que ya existen
        $categoriasIds = DB::table('categorias_negocio')->pluck('id')->toArray();

        for ($i = 1; $i <= 20; $i++) {
            $nombre = $faker->company;
            DB::table('negocios')->insert([
                'user_id' => 1, // Todos pertenecen al admin de prueba por ahora
                'nombre' => $nombre,
                'slug' => Str::slug($nombre) . '-' . $i,
                'descripcion' => $faker->paragraph(2),
                'categoria_manual' => $faker->word,
                'ubicacion' => $faker->address,
                'ruta_logo' => 'https://picsum.photos/200/200?random=' . $i, // Imagen aleatoria
                'enlace_whatsapp' => 'https://wa.me/52' . $faker->numerify('##########'),
                'url_facebook' => 'https://facebook.com/' . Str::slug($nombre),
                'url_instagram' => 'https://instagram.com/' . Str::slug($nombre),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
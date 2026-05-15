<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('es_ES');
        
        // Obtenemos los IDs existentes para no causar errores de llaves foráneas
        $negociosIds = DB::table('negocios')->pluck('id')->toArray();
        $categoriasIds = DB::table('categorias_negocio')->pluck('id')->toArray();

        // Si no hay negocios o categorías, detenemos para evitar errores
        if (empty($negociosIds) || empty($categoriasIds)) {
            $this->command->warn("Faltan negocios o categorías. ¡Siembra esos primero!");
            return;
        }

        foreach ($negociosIds as $negocioId) {
            // Creamos de 2 a 5 productos por cada negocio
            for ($i = 0; $i < rand(2, 5); $i++) {
                DB::table('productos_servicios')->insert([
                    'negocio_id' => $negocioId,
                    'categoria_id' => $faker->randomElement($categoriasIds),
                    'nombre' => $faker->words(3, true),
                    'tipo' => $faker->randomElement(['Producto', 'Servicio']),
                    'descripcion' => $faker->sentence(12),
                    'precio' => $faker->randomFloat(2, 10, 1500), // Precio entre 10 y 1500
                    'esta_activo' => true,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
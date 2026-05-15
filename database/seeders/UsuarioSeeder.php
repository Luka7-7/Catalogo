<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
        'nombre' => 'Admin Test',
        'email' => 'admin@test.com',
        'password' => bcrypt('12345678'), // Siempre usa bcrypt para contraseñas
        'esta_eliminado' => false,
    ]);
    }
}

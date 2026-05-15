<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('email')->unique(); // correo_electronico
        $table->string('password'); // contrasena
        $table->timestamp('email_verified_at')->nullable();
        $table->rememberToken();
        $table->boolean('esta_eliminado')->default(false);
        $table->timestamps(); // Esto crea creado_el y actualizado_el automáticamente
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

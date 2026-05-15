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
        Schema::create('negocios', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('nombre');
        $table->string('slug')->unique();
        $table->text('descripcion')->nullable();
        $table->string('categoria_manual')->nullable(); // Para el campo categoria de tu SQL
        $table->text('ubicacion')->nullable();
        $table->string('ruta_logo')->nullable();
        $table->string('enlace_whatsapp')->nullable();
        $table->string('url_facebook')->nullable();
        $table->string('url_instagram')->nullable();
        $table->string('url_tiktok')->nullable();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('negocios');
    }
};

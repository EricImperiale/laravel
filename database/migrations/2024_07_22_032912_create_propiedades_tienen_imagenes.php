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
        Schema::create('propiedades_tienen_imagenes', function (Blueprint $table) {
            $table->foreignId('propiedad_fk_id')
                ->constrained('propiedades', 'propiedad_id');
            $table->foreignId('imagen_fk_id')
                ->constrained('imagenes_propiedades', 'imagen_id');

            $table->timestamps();
            $table->primary(['propiedad_fk_id', 'imagen_fk_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedades_tienen_imagenes');
    }
};

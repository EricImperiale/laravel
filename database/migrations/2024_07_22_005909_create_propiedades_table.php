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
        Schema::create('propiedades', function (Blueprint $table) {
            $table->id('propiedad_id');
            $table->string('direccion', 125);
            $table->unsignedInteger('altura');
            $table->string('cuidad', 150);
            $table->string('provincia', 150);
            $table->string('barrio', 150);
            $table->unsignedInteger('codigo_postal');
            $table->unsignedInteger('area_total');
            $table->unsignedInteger('area_cubierta');
            $table->text('descripcion')->nullable('La propiedad no tiene ninguna descripción.');
            $table->unsignedInteger('precio_del_alquiler');
            $table->unsignedInteger('expensas')->default(0);
            $table->unsignedInteger('piso')->default(0);
            $table->unsignedInteger('numero_de_departamento')->default(0);
            $table->boolean('es_uso_profesional')->nullable()->default(false);
            $table->boolean('es_interno')->nullable()->default(false);
            $table->unsignedInteger('antiguedad');
            $table->unsignedInteger('ambientes');
            $table->unsignedInteger('cuartos')->nullable();
            $table->unsignedInteger('banios')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedades');
    }
};

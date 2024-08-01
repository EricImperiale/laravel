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
            $table->string('cuidad', 255)->nullable();
            $table->string('provincia', 255);
            $table->string('barrio', 255);
            $table->unsignedInteger('codigo_postal');
            $table->unsignedInteger('area_total');
            $table->unsignedInteger('area_cubierta');
            $table->text('descripcion')->nullable('La propiedad no tiene ninguna descripción.');
            $table->unsignedInteger('precio_del_alquiler');
            $table->unsignedInteger('expensas')->nullable();
            $table->unsignedInteger('piso')->nullable();
            $table->unsignedInteger('numero_de_departamento')->default(0);
            $table->boolean('es_uso_profesional')->nullable();
            $table->unsignedInteger('ambientes');
            $table->unsignedInteger('cuartos');
            $table->unsignedInteger('banios');

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

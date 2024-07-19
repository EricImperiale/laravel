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
        Schema::create('propietarios', function (Blueprint $table) {
            $table->id('propietario_id');
            $table->string('nombre', 255);
            $table->string('apellido', 255);
            $table->unsignedInteger('dni');
            $table->unsignedInteger('cuit');
            $table->string('email', 255)->unique();
            $table->string('direccion', 255);
            $table->unsignedInteger('altura');
            $table->string('cuidad', 255);
            $table->string('pais', 255);
            $table->string('provincia', 255);
            $table->string('barrio', 255);
            $table->char('codigo_postal', 25);
            $table->string('numero_de_telefono', 50);
            $table->dateTime('fecha_de_nacimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propetarios');
    }
};

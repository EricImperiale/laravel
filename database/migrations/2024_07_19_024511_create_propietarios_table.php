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
            $table->string('nombre', 150);
            $table->string('apellido', 150);
            $table->unsignedInteger('dni');
            $table->unsignedInteger('cuit');
            $table->string('email', 255)->unique();
            $table->string('direccion', 150);
            $table->unsignedInteger('altura');
            $table->string('cuidad', 150);
            $table->string('pais', 150);
            $table->string('provincia', 150);
            $table->string('barrio', 150);
            $table->unsignedInteger('codigo_postal');
            $table->unsignedInteger('codigo_de_area');
            $table->string('numero_de_telefono', 50);
            $table->date('fecha_de_nacimiento');
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

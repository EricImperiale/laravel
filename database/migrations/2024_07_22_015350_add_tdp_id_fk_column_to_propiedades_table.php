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
        Schema::table('propiedades', function (Blueprint $table) {
            $table->unsignedTinyInteger('tdp_fk_id')->after('propiedad_id');

            $table->foreign('tdp_fk_id')
                ->references('tdp_id')
                ->on('tipo_de_propiedades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('propiedades', function (Blueprint $table) {
            //
        });
    }
};

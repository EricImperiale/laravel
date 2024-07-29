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
        Schema::table('garantes', function (Blueprint $table) {
            $table->unsignedInteger('prefijo_telefonico_fk_id');

            $table->foreign('prefijo_telefonico_fk_id')
                ->references('prefijo_telefonico_id')
                ->on('prefijo_telefonicos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('garantes', function (Blueprint $table) {
            //
        });
    }
};

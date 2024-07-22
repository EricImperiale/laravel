<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoDePropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado_de_propiedades')->insert([
            [
                'estado' => 'Disponible',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'estado' => 'Ocupada',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'estado' => 'No disponible',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'estado' => 'En reparación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

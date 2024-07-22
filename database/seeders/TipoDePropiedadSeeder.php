<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDePropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_de_propiedades')->insert([
            [
                'tipo_de_propiedad' => 'Casa',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_de_propiedad' => 'Departamento',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'tipo_de_propiedad' => 'PH',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ContratoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contratos')->insert([
            [
                'fecha_de_contrato' => Carbon::now()->locale('es')->translatedFormat('j \d\e F \d\e Y'),
                'fecha_de_comienzo' => Carbon::now()->format('d-m-Y'),
                'fecha_de_final' => Carbon::now()->addMonth(13)->format('d-m-Y'),
                'fecha_de_vencimiento' => 5,
                'propietario_fk_id' => 1,
                'inquilino_fk_id' => 2,
                'propiedad_fk_id' => 1,
                'precio_del_alquiler' => 50000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

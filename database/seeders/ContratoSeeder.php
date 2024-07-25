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
                'precio_del_alquiler' => 50000,
                'fecha_de_comienzo' => Carbon::create('2024', '01', '01'),
                'fecha_de_final' => Carbon::create('2024', '12', '31'),
                'fecha_de_vencimiento' => Carbon::create('2024', '01', '10'),
                'propietario_fk_id' => 1,
                'inquilino_fk_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

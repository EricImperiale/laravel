<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoDeMonedaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_de_monedas')->insert([
            [
                'alpha3' => 'ARS',
                'moneda' => 'Peso Argentino',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'alpha3' => '€',
                'moneda' => 'Euro',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'alpha3' => 'USD',
                'moneda' => 'Dólar Estadounidense',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

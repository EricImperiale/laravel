<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrefijoTelefonicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prefijo_telefonicos')->insert([
            [
                'prefijo' => '54',
                'pais' => 'Argentina',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prefijo' => '55',
                'pais' => 'Brasil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prefijo' => '57',
                'pais' => 'Colombia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prefijo' => '51',
                'pais' => 'Perú',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prefijo' => '52',
                'pais' => 'México',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

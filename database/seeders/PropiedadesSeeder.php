<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropiedadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('propiedades')->insert([
            [
                'direccion' => 'Calle Falsa',
                'altura' => 1234,
                'cuidad' => 'Buenos Aires',
                'provincia' => 'Buenos Aires',
                'barrio' => 'Palermo',
                'codigo_postal' => '1414',
                'area_total' => 250,
                'area_cubierta' => 200,
                'descripcion' => 'Hermosa casa con jardín y piscina.',
                'precio_del_alquiler' => 150000,
                'expensas' => 0,
                'piso' => 0,
                'numero_de_departamento' => 0,
                'es_uso_profesional' => false,
                'ambientes' => 5,
                'cuartos' => 3,
                'banios' => 2,
                'tdp_fk_id' => 1,
                'propietario_fk_id' => 1,
                'estado_fk_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

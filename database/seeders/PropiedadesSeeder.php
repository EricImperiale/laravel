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
                'departamento' => '',
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
                'es_interno' => false,
                'antiguedad' => 10,
                'ambientes' => 5,
                'cuartos' => 3,
                'banios' => 2,
                'tdp_fk_id' => 1,
                'propietario_fk_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'direccion' => 'Avenida Siempre Viva',
                'altura' => 742,
                'departamento' => 'A',
                'cuidad' => 'Buenos Aires',
                'provincia' => 'Buenos Aires',
                'barrio' => 'Recoleta',
                'codigo_postal' => '1122',
                'area_total' => 80,
                'area_cubierta' => 75,
                'descripcion' => 'Departamento moderno con balcón.',
                'precio_del_alquiler' => 75000,
                'expensas' => 10000,
                'piso' => 5,
                'numero_de_departamento' => 3,
                'es_uso_profesional' => false,
                'es_interno' => false,
                'antiguedad' => 0,
                'ambientes' => 3,
                'cuartos' => 2,
                'banios' => 1,
                'tdp_fk_id' => 2,
                'propietario_fk_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'direccion' => 'Calle San Martín',
                'altura' => 5678,
                'departamento' => '',
                'cuidad' => 'Buenos Aires',
                'provincia' => 'Buenos Aires',
                'barrio' => 'Belgrano',
                'codigo_postal' => '1428',
                'area_total' => 150,
                'area_cubierta' => 130,
                'descripcion' => 'PH amplio con patio y terraza.',
                'precio_del_alquiler' => 90000,
                'expensas' => 5000,
                'piso' => 1,
                'numero_de_departamento' => 0,
                'es_uso_profesional' => true,
                'es_interno' => false,
                'antiguedad' => 5,
                'ambientes' => 4,
                'cuartos' => 2,
                'banios' => 2,
                'tdp_fk_id' => 3,
                'propietario_fk_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}

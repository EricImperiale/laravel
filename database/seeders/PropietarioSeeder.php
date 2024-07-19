<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PropietarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('propietarios')->insert([
            [
                'nombre' => 'Juan',
                'apellido' => 'Perez',
                'dni' => 12345678,
                'cuit' => 20123456789,
                'email' => 'juan.perez@example.com',
                'direccion' => 'Calle Falsa',
                'altura' => 123,
                'cuidad' => 'Buenos Aires',
                'pais' => 'Argentina',
                'provincia' => 'Buenos Aires',
                'barrio' => 'Palermo',
                'codigo_postal' => '1425',
                'numero_de_telefono' => '123456789',
                'fecha_de_nacimiento' => '1980-01-01 00:00:00',
                'prefijo_telefonico_fk_id' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Maria',
                'apellido' => 'Gomez',
                'dni' => 23456789,
                'cuit' => 20234567890,
                'email' => 'maria.gomez@example.com',
                'direccion' => 'Avenida Siempre Viva',
                'altura' => 456,
                'cuidad' => 'Córdoba',
                'pais' => 'Argentina',
                'provincia' => 'Córdoba',
                'barrio' => 'Centro',
                'codigo_postal' => '5000',
                'numero_de_telefono' => '987654321',
                'fecha_de_nacimiento' => '1990-02-02 00:00:00',
                'prefijo_telefonico_fk_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Ramirez',
                'dni' => 34567890,
                'cuit' => 20345678901,
                'email' => 'carlos.ramirez@example.com',
                'direccion' => 'Calle 123',
                'altura' => 789,
                'cuidad' => 'Rosario',
                'pais' => 'Argentina',
                'provincia' => 'Santa Fe',
                'barrio' => 'Echesortu',
                'codigo_postal' => '2000',
                'numero_de_telefono' => '1122334455',
                'fecha_de_nacimiento' => '1985-03-03 00:00:00',
                'prefijo_telefonico_fk_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

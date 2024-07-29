<?php

namespace Database\Seeders;

use App\Models\PrefijoTelefonico;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        //User::factory()->create([
            //'name' => 'Test User',
            //'email' => 'test@example.com',
        //]);

        $this->call(UserSeeder::class);
        $this->call(PrefijoTelefonicoSeeder::class);
        $this->call(GaranteSeeder::class);
        $this->call(InquilinoSeeder::class);
        $this->call(PropietarioSeeder::class);

        $this->call(TipoDePropiedadSeeder::class);
        $this->call(EstadoDePropiedadSeeder::class);
        $this->call(PropiedadesSeeder::class);

        $this->call(TipoDeMonedaSeeder::class);
        $this->call(ContratoSeeder::class);
    }
}

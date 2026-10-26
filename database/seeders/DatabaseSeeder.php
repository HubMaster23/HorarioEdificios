<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Aula;
use App\Models\Edificio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $edificio = Edificio::create(['nombre' => 'Edificio C']);

        foreach (['C1', 'C2', 'C3', 'C4', 'C5'] as $nombre) {
            Aula::create([
                'nombre'      => $nombre,
                'capacidad'   => 30,
                'wifi'        => true,
                'edificio_id' => $edificio->id,
            ]);
        }
    }
}
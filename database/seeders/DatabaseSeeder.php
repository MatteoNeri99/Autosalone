<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Auto;
use App\Models\Carburante;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CarburanteSeeder::class,
            TipologiaSeeder::class,
            AutoSeeder::class,

        ]);
    }
}

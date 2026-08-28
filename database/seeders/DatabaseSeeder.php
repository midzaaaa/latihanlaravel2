<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            PerusahaanSeeder::class,
            KompetensiSeeder::class,
            SiswaSeeder::class,
        ]);
    }
}
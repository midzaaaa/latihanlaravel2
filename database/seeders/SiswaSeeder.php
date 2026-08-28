<?php

namespace Database\Seeders;

use App\Models\Kompetensi;
use App\Models\Siswa;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        Siswa::factory()
            ->count(30)
            ->create()
            ->each(function ($siswa) {

                $kompetensi = Kompetensi::inRandomOrder()
                    ->limit(rand(2, 5))
                    ->pluck('id');

                $siswa->kompetensi()->attach($kompetensi);
            });
    }
}
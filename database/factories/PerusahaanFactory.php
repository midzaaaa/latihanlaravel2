<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PerusahaanFactory extends Factory
{
    public function definition()
    {
        return [
    'nama_perusahaan' => $this->faker->company(),
    'alamat' => $this->faker->address(),
    'telepon' => $this->faker->phoneNumber(),
    'bidang_usaha' => $this->faker->randomElement([
        'Teknologi',
        'Manufaktur',
        'Perbankan',
        'Pendidikan',
        'Kesehatan'
    ]),
];
    }
}
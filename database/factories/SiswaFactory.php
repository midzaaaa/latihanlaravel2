<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
   public function definition()
{
   return [
    'nis' => $this->faker->unique()->numerify('##########'),
    'nama' => $this->faker->name(),
    'kelas' => 'XI RPL 1',
    'tanggal_mulai_pkl' => now(),
    'tanggal_selesai_pkl' => now()->addMonths(3),
    'perusahaan_id' => 1,
];
}
}

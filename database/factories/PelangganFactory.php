<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'jenis_kelamin' => rand(0, 1) ? 'Laki-laki' : 'Perempuan',
            'alamat' => fake()->address(),
            'nomor_telepon' => fake()->phoneNumber(),
            'saldo' => fake()->numberBetween(-5000000, -25000000)
        ];
    }
}

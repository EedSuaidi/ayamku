<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengeluaran>
 */
class PengeluaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kategori' => $this->faker->randomElement(['Makanan', 'Pakaian', 'Elektronik', 'Kesehatan']),
            'total' => fake()->numberBetween(2000000, 10000000),
            'tanggal_pengeluaran' => fake()->dateTimeBetween('-1 year', 'now'),
            'keterangan' => $this->faker->sentence(10)
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pemasukan>
 */
class PemasukanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pelanggan_id' => Pelanggan::factory(),
            'total' => fake()->numberBetween(2000000, 10000000),
            'tanggal_pemasukan' => fake()->dateTimeBetween('-1 year', 'now')
        ];
    }
}

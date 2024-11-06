<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penjualan>
 */
class PenjualanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jumlah_berat = fake()->randomFloat(1, 10, 100);
        $harga = 23000;

        return [
            'pelanggan_id' => Pelanggan::factory(),
            'jumlah_ekor' => fake()->numberBetween(10, 50),
            'jumlah_berat' => $jumlah_berat,
            'harga' => $harga,
            'total' => $jumlah_berat * $harga,
            'tanggal_penjualan' => fake()->dateTimeBetween('-1 year', 'now')
        ];
    }
}

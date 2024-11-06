<?php

namespace Database\Factories;

use App\Models\Perusahaan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembelian>
 */
class PembelianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jumlah_berat = fake()->randomFloat(1, 10, 100);
        $harga = 20000;

        return [
            'perusahaan_id' => Perusahaan::factory(),
            'jumlah_berat' => $jumlah_berat,
            'harga' => $harga,
            'total' => $jumlah_berat * $harga,
            'tanggal_pembelian' => fake()->dateTimeBetween('-1 year', 'now')
        ];
    }
}

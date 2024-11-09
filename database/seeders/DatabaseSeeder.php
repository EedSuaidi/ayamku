<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use App\Models\Perusahaan;
use App\Models\Penjualan;
use App\Models\Pembelian;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Penjualan::factory(1000)->recycle([
            Pelanggan::factory(50)->create()
        ])->create();

        Pembelian::factory(30)->recycle([
            Perusahaan::factory(10)->create()
        ])->create();

        Pemasukan::factory(1000)->recycle([
            Pelanggan::factory(50)->create()
        ])->create();

        Pengeluaran::factory(30)->create();

        // Pelanggan::factory()->create([
        //     'nama' => 'Joko',
        //     'jenis_kelamin' => 'Laki-laki',
        // ]);
    }
}

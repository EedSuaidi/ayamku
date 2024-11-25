<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Perusahaan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPelanggan = Pelanggan::count();
        $jumlahPerusahaan = Perusahaan::count();

        return view('dashboard.index', [
            'title' => 'Dashboard',
            'jumlahPelanggan' => $jumlahPelanggan,
            'jumlahPerusahaan' => $jumlahPerusahaan,
        ]);
    }
}

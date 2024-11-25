<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Penjualan!';
        $text = "Yakin Ingin Menghapus Data Penjualan?";
        confirmDelete($title, $text);

        return view('dashboard.penjualans.index', [
            'penjualans' => Penjualan::latest()->get(),
            'title' => 'Daftar Penjualan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.penjualans.create', [
            'pelanggans' => Pelanggan::orderBy('nama')->get(),
            'title' => 'Tambah Penjualan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pelanggan_id' => 'required|max:128',
            'jumlah_ekor' => 'required',
            'jumlah_berat' => 'required',
            'harga' => 'required|integer',
            'total' => 'required|integer',
            'tanggal_penjualan' => 'required|date',
        ]);

        // Kurangi saldo pelanggan
        $pelanggan = Pelanggan::findOrFail($validatedData['pelanggan_id']);
        $pelanggan->saldo -= $validatedData['total'];
        $pelanggan->save();

        Penjualan::create($validatedData);

        alert()->success('Data Berhasil Disimpan!');

        return redirect('/dashboard/penjualans');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        return view('dashboard.penjualans.show', compact('penjualan'), [
            'title' => 'Detail Penjualan'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);

        // Tambah saldo pelanggan
        $pelanggan = Pelanggan::findOrFail($penjualan->pelanggan_id);
        $pelanggan->saldo += $penjualan->total;
        $pelanggan->save();

        $penjualan->delete();

        alert()->success('Data berhasil dihapus!');

        return redirect('/dashboard/penjualans');
    }
}

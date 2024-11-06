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
        $title = 'Delete Penjualan!';
        $text = "Are you sure you want to delete?";
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
     * Show the form for editing the specified resource.
     */
    // public function edit(Penjualan $penjualan)
    // {
    //     return view('dashboard.penjualans.edit', compact('penjualan'), [
    //         'title' => 'Edit Penjualan'
    //     ]);
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, Penjualan $penjualan)
    // {
    //     $validatedData = $request->validate([
    //         'nama' => 'required|max:128',
    //         'alamat' => 'required|max:256',
    //         'nomor_telepon' => 'required|max:32',
    //     ]);

    //     Penjualan::where('id', $penjualan->id)->update($validatedData);

    //     alert()->success('Data Berhasil Diubah!');

    //     return redirect('/dashboard/penjualans');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        Penjualan::destroy($penjualan->id);

        alert()->success('Data berhasil dihapus!');

        return redirect('/dashboard/penjualans');
    }
}

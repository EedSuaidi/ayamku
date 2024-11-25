<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Pembelian!';
        $text = "Yakin Ingin Menghapus Data Pembelian?";
        confirmDelete($title, $text);

        return view('dashboard.pembelians.index', [
            'pembelians' => Pembelian::latest()->get(),
            'title' => 'Daftar Pembelian'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pembelians.create', [
            'perusahaans' => Perusahaan::orderBy('nama')->get(),
            'title' => 'Tambah Pembelian'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'perusahaan_id' => 'required|max:128',
            'jumlah_berat' => 'required',
            'harga' => 'required|integer',
            'total' => 'required|integer',
            'tanggal_pembelian' => 'required|date',
        ]);

        Pembelian::create($validatedData);

        alert()->success('Data Berhasil Disimpan!');

        return redirect('/dashboard/pembelians');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        return view('dashboard.pembelians.show', compact('pembelian'), [
            'title' => 'Detail Pembelian'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $pembelian)
    {
        Pembelian::destroy($pembelian->id);

        alert()->success('Data berhasil dihapus!');

        return redirect('/dashboard/pembelians');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Pelanggan!';
        $text = "Yakin Ingin Menghapus Data Pelanggan?";
        confirmDelete($title, $text);

        return view('dashboard.pelanggans.index', [
            'pelanggans' => Pelanggan::latest()->get(),
            'title' => 'Daftar Pelanggan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pelanggans.create', [
            'title' => 'Tambah Pelanggan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:128',
            'jenis_kelamin' => 'required|max:64',
            'alamat' => 'required|max:256',
            'nomor_telepon' => 'required|max:32',
            'saldo' => 'required'
        ]);

        Pelanggan::create($validatedData);

        alert()->success('Data Berhasil Disimpan!');

        return redirect('/dashboard/pelanggans');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        return view('dashboard.pelanggans.show', compact('pelanggan'), [
            'title' => 'Detail Pelanggan'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('dashboard.pelanggans.edit', compact('pelanggan'), [
            'title' => 'Edit Pelanggan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:128',
            'jenis_kelamin' => 'required|max:64',
            'alamat' => 'required|max:256',
            'nomor_telepon' => 'required|max:32',
            'saldo' => 'required'
        ]);

        $pelanggan->update($validatedData);

        alert()->success('Data Berhasil Diubah!');

        return redirect('/dashboard/pelanggans');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        Pelanggan::destroy($pelanggan->id);

        alert()->success('Data berhasil dihapus!');

        return redirect('/dashboard/pelanggans');
    }
}

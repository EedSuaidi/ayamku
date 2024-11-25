<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Pemasukan;
use Illuminate\Http\Request;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Pemasukan!';
        $text = "Yakin Ingin Menghapus Data Pemasukan?";
        confirmDelete($title, $text);

        return view('dashboard.pemasukans.index', [
            'pemasukans' => Pemasukan::latest()->get(),
            'title' => 'Daftar Pemasukan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pemasukans.create', [
            'pelanggans' => Pelanggan::orderBy('nama')->get(),
            'title' => 'Tambah Pemasukan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'pelanggan_id' => 'required|max:128',
            'total' => 'required|integer',
            'tanggal_pemasukan' => 'required|date',
        ]);

        // Tambah saldo pelanggan
        $pelanggan = Pelanggan::findOrFail($validatedData['pelanggan_id']);
        $pelanggan->saldo += $validatedData['total'];
        $pelanggan->save();

        Pemasukan::create($validatedData);

        alert()->success('Data Berhasil Disimpan!');

        return redirect('/dashboard/pemasukans');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemasukan $pemasukan)
    {
        return view('dashboard.pemasukans.show', compact('pemasukan'), [
            'title' => 'Detail Pemasukan'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);

        // Kurangi saldo pelanggan
        $pelanggan = Pelanggan::findOrFail($pemasukan->pelanggan_id);
        $pelanggan->saldo -= $pemasukan->total;
        $pelanggan->save();

        $pemasukan->delete();

        alert()->success('Data berhasil dihapus!');

        return redirect('/dashboard/pemasukans');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Pengeluaran!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('dashboard.pengeluarans.index', [
            'pengeluarans' => Pengeluaran::latest()->get(),
            'title' => 'Daftar Pengeluaran'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pengeluarans.create', [
            'title' => 'Tambah Pengeluaran'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kategori' => 'required|max:128',
            'total' => 'required|integer',
            'tanggal_pengeluaran' => 'required|date',
            'keterangan' => ''
        ]);

        Pengeluaran::create($validatedData);

        alert()->success('Data Berhasil Disimpan!');

        return redirect('/dashboard/pengeluarans');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengeluaran $pengeluaran)
    {
        return view('dashboard.pengeluarans.show', compact('pengeluaran'), [
            'title' => 'Detail Pengeluaran'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

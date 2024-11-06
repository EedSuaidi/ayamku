<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Delete Perusahaan!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('dashboard.perusahaans.index', [
            'perusahaans' => Perusahaan::latest()->get(),
            'title' => 'Perusahaan'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.perusahaans.create', [
            'title' => 'Tambah Perusahaan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:128',
            'alamat' => 'required|max:256',
            'nomor_telepon' => 'required|max:32',
        ]);

        Perusahaan::create($validatedData);

        alert()->success('Data Berhasil Disimpan!');

        return redirect('/dashboard/perusahaans');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perusahaan $perusahaan)
    {
        return view('dashboard.perusahaans.show', compact('perusahaan'), [
            'title' => 'Detail Perusahaan'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
    {
        return view('dashboard.perusahaans.edit', compact('perusahaan'), [
            'title' => 'Edit Perusahaan'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:128',
            'alamat' => 'required|max:256',
            'nomor_telepon' => 'required|max:32',
        ]);

        Perusahaan::where('id', $perusahaan->id)->update($validatedData);

        alert()->success('Data Berhasil Diubah!');

        return redirect('/dashboard/perusahaans');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        Perusahaan::destroy($perusahaan->id);

        alert()->success('Data berhasil dihapus!');

        return redirect('/dashboard/perusahaans');
    }
}

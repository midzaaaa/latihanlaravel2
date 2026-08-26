<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaans = Perusahaan::paginate(10);

        return view('perusahaan.index', compact('perusahaans'));
    }

    public function create()
    {
        return view('perusahaan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perusahaan' => 'required|max:100',
            'bidang_usaha' => 'required|max:100',
            'alamat' => 'required',
            'nama_pembimbing_industri' => 'nullable|max:100',
            'telepon' => 'nullable|max:20',
        ]);

        Perusahaan::create($validated);

        return redirect()->route('perusahaan.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        return view('perusahaan.show', compact('perusahaan'));
    }

    public function edit($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        return view('perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);

        $validated = $request->validate([
            'nama_perusahaan' => 'required|max:100',
            'bidang_usaha' => 'required|max:100',
            'alamat' => 'required',
            'nama_pembimbing_industri' => 'nullable|max:100',
            'telepon' => 'nullable|max:20',
        ]);

        $perusahaan->update($validated);

        return redirect()->route('perusahaan.index')
            ->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->delete();

        return redirect()->route('perusahaan.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
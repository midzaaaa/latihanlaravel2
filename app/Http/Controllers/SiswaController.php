<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::with('perusahaan')->paginate(10);

        return view('siswa.index', compact('siswas'));
    }

    public function create()
    {
        $perusahaans = Perusahaan::all();

        return view('siswa.create', compact('perusahaans'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required|max:255',
            'kelas' => 'required|max:30',
            'tanggal_mulai_pkl' => 'required|date',
            'tanggal_selesai_pkl' => 'required|date|after_or_equal:tanggal_mulai_pkl',
            'perusahaan_id' => 'required|exists:perusahaans,id',
        ]);

        Siswa::create($validated);

        return redirect()->route('siswa.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function show($id)
    {
        $siswa = Siswa::with('perusahaan')->findOrFail($id);

        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $perusahaans = Perusahaan::all();

        return view('siswa.edit', compact('siswa', 'perusahaans'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $validated = $request->validate([
            'nis' => 'required|unique:siswas,nis,' . $siswa->id,
            'nama' => 'required|max:255',
            'kelas' => 'required|max:30',
            'tanggal_mulai_pkl' => 'required|date',
            'tanggal_selesai_pkl' => 'required|date|after_or_equal:tanggal_mulai_pkl',
            'perusahaan_id' => 'required|exists:perusahaans,id',
        ]);

        $siswa->update($validated);

        return redirect()->route('siswa.index')
            ->with('success', 'Data berhasil diupdate.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        return redirect()->route('siswa.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}
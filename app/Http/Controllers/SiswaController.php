<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Perusahaan;
use App\Models\Kompetensi;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::with(['perusahaan', 'kompetensi'])
            ->latest()
            ->get();

        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $perusahaan = Perusahaan::orderBy('nama_perusahaan')->get();
        $kompetensi = Kompetensi::orderBy('nama_kompetensi')->get();

        return view('siswa.create', compact('perusahaan', 'kompetensi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama' => 'required|max:255',
            'kelas' => 'required|max:50',
            'jurusan' => 'required|max:100',
            'perusahaan_id' => 'required|exists:perusahaans,id',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'kompetensi' => 'required|array',
            'kompetensi.*' => 'exists:kompetensis,id',
        ]);

        $siswa = Siswa::create([
            'nis' => $validated['nis'],
            'nama' => $validated['nama'],
            'kelas' => $validated['kelas'],
            'jurusan' => $validated['jurusan'],
            'perusahaan_id' => $validated['perusahaan_id'],
            'tanggal_mulai' => $validated['tanggal_mulai'] ?? null,
            'tanggal_selesai' => $validated['tanggal_selesai'] ?? null,
        ]);

        $siswa->kompetensi()->attach($validated['kompetensi']);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    public function show($id)
    {
        $siswa = Siswa::with(['perusahaan', 'kompetensi'])->findOrFail($id);

        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $siswa = Siswa::with('kompetensi')->findOrFail($id);
        $perusahaan = Perusahaan::orderBy('nama_perusahaan')->get();
        $kompetensi = Kompetensi::orderBy('nama_kompetensi')->get();

        return view('siswa.edit', compact('siswa', 'perusahaan', 'kompetensi'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $validated = $request->validate([
            'nis' => 'required|unique:siswas,nis,' . $siswa->id,
            'nama' => 'required|max:255',
            'kelas' => 'required|max:50',
            'jurusan' => 'required|max:100',
            'perusahaan_id' => 'required|exists:perusahaans,id',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'kompetensi' => 'required|array',
            'kompetensi.*' => 'exists:kompetensis,id',
        ]);

        $siswa->update([
            'nis' => $validated['nis'],
            'nama' => $validated['nama'],
            'kelas' => $validated['kelas'],
            'jurusan' => $validated['jurusan'],
            'perusahaan_id' => $validated['perusahaan_id'],
            'tanggal_mulai' => $validated['tanggal_mulai'] ?? null,
            'tanggal_selesai' => $validated['tanggal_selesai'] ?? null,
        ]);

        $siswa->kompetensi()->sync($validated['kompetensi']);

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil diupdate.');
    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()
            ->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus.');
    }
}
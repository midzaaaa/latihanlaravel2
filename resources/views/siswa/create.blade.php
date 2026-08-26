@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Data Siswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" name="nis" id="nis" class="form-control" value="{{ old('nis') }}">
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control" placeholder="Contoh: XI RPL 1" value="{{ old('kelas') }}">
        </div>

        <div class="mb-3">
            <label for="tanggal_mulai_pkl" class="form-label">Tanggal Mulai PKL</label>
            <input type="date" name="tanggal_mulai_pkl" id="tanggal_mulai_pkl" class="form-control" value="{{ old('tanggal_mulai_pkl') }}">
        </div>

        <div class="mb-3">
            <label for="tanggal_selesai_pkl" class="form-label">Tanggal Selesai PKL</label>
            <input type="date" name="tanggal_selesai_pkl" id="tanggal_selesai_pkl" class="form-control" value="{{ old('tanggal_selesai_pkl') }}">
        </div>

        <div class="mb-3">
            <label for="perusahaan_id" class="form-label">Perusahaan</label>
            <select name="perusahaan_id" id="perusahaan_id" class="form-control">
                <option value="">-- Pilih Perusahaan --</option>
                @foreach ($perusahaans as $perusahaan)
                    <option value="{{ $perusahaan->id }}" {{ old('perusahaan_id') == $perusahaan->id ? 'selected' : '' }}>
                        {{ $perusahaan->nama_perusahaan }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
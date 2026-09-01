@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Data Siswa</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" name="nis" id="nis" class="form-control" value="{{ old('nis', $siswa->nis) }}">
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $siswa->nama) }}">
        </div>

        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input type="text" name="kelas" id="kelas" class="form-control" value="{{ old('kelas', $siswa->kelas) }}">
        </div>

        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" name="jurusan" id="jurusan" class="form-control" value="{{ old('jurusan', $siswa->jurusan) }}">
        </div>

        <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai PKL</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" value="{{ old('tanggal_mulai', $siswa->tanggal_mulai) }}">
        </div>

        <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai PKL</label>
            <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" value="{{ old('tanggal_selesai', $siswa->tanggal_selesai) }}">
        </div>

        <div class="mb-3">
            <label for="perusahaan_id" class="form-label">Perusahaan</label>
            <select name="perusahaan_id" id="perusahaan_id" class="form-control">
                <option value="">-- Pilih Perusahaan --</option>
                @foreach ($perusahaan as $p)
                    <option value="{{ $p->id }}" {{ old('perusahaan_id', $siswa->perusahaan_id) == $p->id ? 'selected' : '' }}>
                        {{ $p->nama_perusahaan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Kompetensi</label>
            @php
                $selectedKompetensi = old('kompetensi', $siswa->kompetensi->pluck('id')->toArray());
            @endphp
            @foreach ($kompetensi as $k)
                <div class="form-check">
                    <input
                        type="checkbox"
                        name="kompetensi[]"
                        value="{{ $k->id }}"
                        id="kompetensi_{{ $k->id }}"
                        class="form-check-input"
                        {{ in_array($k->id, $selectedKompetensi) ? 'checked' : '' }}>
                    <label for="kompetensi_{{ $k->id }}" class="form-check-label">
                        {{ $k->nama_kompetensi }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Data Perusahaan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('perusahaan.store') }}" method="POST">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control" value="{{ old('nama_perusahaan') }}">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="form-control" value="{{ old('alamat') }}">
        </div>

         <div class="mb-3">
            <label for="bidang_usaha" class="form-label">Bidang Usaha</label>
            <input type="text" name="bidang_usaha" id="bidang_usaha" class="form-control" value="{{ old('bidang_usaha') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
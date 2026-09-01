@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Edit Kompetensi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kompetensi.update', $kompetensi->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nama_kompetensi" class="form-label">Nama Kompetensi</label>
            <input type="text" name="nama_kompetensi" id="nama_kompetensi" class="form-control" value="{{ old('nama_kompetensi', $kompetensi->nama_kompetensi) }}">
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $kompetensi->deskripsi) }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kompetensi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
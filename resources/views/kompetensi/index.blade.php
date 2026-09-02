@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Data Kompetensi 🧾</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <a href="{{ route('kompetensi.create') }}" class="btn btn-primary mb-3">Tambah Kompetensi</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kompetensi</th>
                <th>Deskripsi</th>
                <th>Jumlah Siswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kompetensi as $index => $k)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $k->nama_kompetensi }}</td>
                    <td>{{ $k->deskripsi }}</td>
                    <td class="text-center">{{ $k->siswa_count }} siswa</td>
                    <td>
                        <a href="{{ route('kompetensi.show', $k->id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('kompetensi.edit', $k->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('kompetensi.destroy', $k->id) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('Yakin hapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada data kompetensi.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
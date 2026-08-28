@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Siswa</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('siswa.create') }}" class="btn btn-primary mb-3">Tambah Siswa</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Perusahaan</th>
                <th>Aksi</th>
                <th>Kompetensi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswa as $s)
                <tr>
                    <td>{{ $s->nis }}</td>
                    <td>{{ $s->nama }}</td>
                    <td>{{ $s->perusahaan->nama_perusahaan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', $s->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('siswa.show', $s->id) }}" class="btn btn-sm btn-info">Detail</a>
                        <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada data siswa.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
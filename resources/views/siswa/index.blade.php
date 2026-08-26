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
            </tr>
        </thead>
        <tbody>
            @forelse ($siswas as $siswa)
                <tr>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nama }}</td>
                    <td>{{ $siswa->perusahaan->nama_perusahaan ?? '-' }}</td>
                    <td>
                        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST" style="display:inline">
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

    {{ $siswas->links() }}
</div>
@endsection
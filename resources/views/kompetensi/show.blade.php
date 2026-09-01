@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Detail Kompetensi</h1>

    <table class="table table-bordered">
        <tr>
            <th width="200">Nama Kompetensi</th>
            <td>{{ $kompetensi->nama_kompetensi }}</td>
        </tr>
        <tr>
            <th>Deskripsi</th>
            <td>{{ $kompetensi->deskripsi ?? '-' }}</td>
        </tr>
    </table>

    <h5>Siswa dengan Kompetensi Ini</h5>
    <ul>
        @forelse ($kompetensi->siswa as $s)
            <li>{{ $s->nama }}</li>
        @empty
            <li>Belum ada siswa.</li>
        @endforelse
    </ul>

    <a href="{{ route('kompetensi.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
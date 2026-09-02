@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mb-4">Selamat Datang di Sistem PKL</h1>
    <p class="text-muted mb-4">Kelola data siswa, perusahaan mitra, dan kompetensi PKL dalam satu tempat.</p>

    <div class="row g-3">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">Data Siswa</h5>
                    <p class="display-6">{{ $totalSiswa }}</p>
                    <a href="{{ route('siswa.index') }}" class="btn btn-light btn-sm">Lihat Data Siswa</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Data Perusahaan</h5>
                    <p class="display-6">{{ $totalPerusahaan }}</p>
                    <a href="{{ route('perusahaan.index') }}" class="btn btn-light btn-sm">Lihat Data Perusahaan</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Data Kompetensi</h5>
                    <p class="display-6">{{ $totalKompetensi }}</p>
                    <a href="{{ route('kompetensi.index') }}" class="btn btn-light btn-sm">Lihat Data Kompetensi</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
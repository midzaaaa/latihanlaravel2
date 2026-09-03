<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perusahaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background:#f4f6f9;
        }
        .card{
            margin-top:40px;
            border:none;
            box-shadow:0 0 15px rgba(0, 110, 255, 0.1);
        }
        .a{
            text-decoration:none;
            background-color:purple;
            color:white;
        }
        .table-wrapper{
            border-radius:12px;
            overflow:hidden;
            border:1px solid #dee2e6;
        }
        .table-wrapper table{
            margin-bottom:0;
        }
        .btn-beranda-float {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background-color: #0d6efd;
            color: white;
            padding: 12px 20px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 15px;
            font-weight: 500;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
            transition: all 0.2s ease;
            z-index: 1000;
        }
        .btn-beranda-float:hover {
            background-color: #0b5ed7;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3>🎓 Data Perusahaan Mitra PKL</h3>
            <a href="{{ route('perusahaan.create') }}" class="btn btn-primary">+ Tambah Perusahaan</a>
        </div>
        <div class="card-body">

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-wrapper">
                <table class="table table-bordered table-hover">
                   <thead class="table-dark text-center">
        <tr>
            <th>No</th>
            <th>Nama Perusahaan</th>
            <th>Alamat</th>
            <th>Pembimbing Industri</th>
            <th>Jumlah Siswa</th>
            <th>Telepon</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($perusahaans as $index => $p)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $p->nama_perusahaan }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->nama_pembimbing_industri }}</td>
            <td class="text-center">{{ $p->siswa_count ?? 0 }} siswa</td>
            <td>{{ $p->telepon }}</td>
            <td class="text-center">
                <a href="{{ route('perusahaan.show', $p->id) }}" class="btn btn-sm btn-info text-white mb-1">
                    Detail
                </a>
                <a href="{{ route('perusahaan.edit', $p->id) }}" class="btn btn-sm btn-warning text-white mb-1">
                    Edit
                </a>
                <form action="{{ route('perusahaan.destroy', $p->id) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Yakin mau hapus data {{ $p->nama_perusahaan }}?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger mb-1">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">Belum ada data perusahaan.</td>
        </tr>
        @endforelse
    </tbody>
                </table>
            </div>

            {{ $perusahaans->links() }}
        </div>
    </div>
</div>

<a href="{{ route('home') }}" class="btn-beranda-float" title="Kembali ke Beranda">
    🏠 Beranda
</a>

</body>
</html>
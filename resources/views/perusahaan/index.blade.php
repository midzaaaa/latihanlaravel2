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
            box-shadow:0 0 15px rgba(7, 113, 252, 0.1);
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
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
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
            <td>{{ $p->telepon }}</td>
            <td class="text-center">
                <a href="{{ route('perusahaan.show', $p->id) }}" class="btn btn-sm btn-info text-white mb-1">
                    Detail
                </a>
                <a href="{{ route('perusahaan.show', $p->id) }}" class="btn btn-sm btn-success text-white mb-1">
                    Lihat Daftar Siswa
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
</body>
</html>
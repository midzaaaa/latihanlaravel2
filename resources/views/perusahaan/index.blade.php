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
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <h3>📋 Data Perusahaan Mitra PKL</h3>
           <a href="{{ route('perusahaan.create') }}" class="btn btn-primary">+ Tambah Perusahaan</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead class="table-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Bidang Usaha</th>
                        <th>Alamat</th>
                        <th>Pembimbing Industri</th>
                        <th>Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($perusahaans as $index => $p)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p->nama_perusahaan }}</td>
                        <td>{{ $p->bidang_usaha }}</td>
                        <td>{{ $p->alamat }}</td>
                        <td>{{ $p->pembimbing_industri }}</td>
                        <td>{{ $p->telepon }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data perusahaan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $perusahaans->links() }}
        </div>
    </div>
</div>
</body>
</html>
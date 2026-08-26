<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Perusahaan</title>
</head>
<body>

    <h1>Detail Perusahaan</h1>

    <p>Nama Perusahaan: {{ $perusahaan->nama_perusahaan }}</p>
    <p>Bidang Usaha: {{ $perusahaan->bidang_usaha }}</p>

    <a href="{{ route('perusahaan.index') }}">Kembali</a>

</body>
</html>
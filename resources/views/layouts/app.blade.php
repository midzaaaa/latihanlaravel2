    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi PKL</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f7fb;
        }

        .container{
            margin-top:40px;
        }

        .card{
            border:none;
            border-radius:12px;
            box-shadow:0 0 15px rgba(0,0,0,.1);
        }

        .card-header{
            background:#0d6efd;
            color:white;
            font-weight:bold;
            font-size:22px;
        }

        table th{
            background:#0d6efd;
            color:white;
            text-align:center;
        }

        table td{
            vertical-align:middle;
        }

        .pagination{
            justify-content:center;
            margin-top:20px;
        }

        /* Memperbaiki SVG pagination */
        svg{
            width:1em;
            height:1em;
        }

        /* Tombol Beranda mengambang */
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
        <div class="card-header">
            🎓 Sistem PKL
        </div>

        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @yield('content')

        </div>
    </div>

</div>
@if (!request()->routeIs('home'))
<a href="{{ route('home') }}" class="btn-beranda-float" title="Kembali ke Beranda">
    🏠 Beranda
</a>
@endif
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
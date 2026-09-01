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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
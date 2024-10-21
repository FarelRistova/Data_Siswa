<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome - DataSiswa</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset('images/bg-siswa.jpg') }}') no-repeat center center/cover;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .welcome-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 30px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.1);
        }

        .btn-custom {
            padding: 15px 40px;
            font-size: 1.2rem;
            border-radius: 50px;
            background-color: #28a745;
            color: white;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #218838;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .logo {
            max-width: 150px;
            /* Kontrol ukuran logo */
            margin-bottom: 20px;
            /* Jarak antara logo dan teks */
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.1);
            /* Efek zoom saat logo dihover */
        }
    </style>
</head>

<body>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="welcome-container">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <img src="{{ url('logostudentdata.png') }}" alt="Logo Data Siswa" class="logo"
                style="width: 50%; height: auto; margin-bottom: 10px;">
        </div>
        <p class="lead mb-4">Kelola data siswa dengan mudah dan cepat.</p>
        <a href="{{ route('login') }}" class="btn btn-success mt-3">Sign In</a>
        <a href="{{ route('register') }}" class="btn btn-primary mt-3">Sign Up</a>
    </div>


    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>

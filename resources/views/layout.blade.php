<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - DataSiswa</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* Menambahkan gaya untuk mengurangi margin atas konten */
        .content {
            margin-top: 20px; /* Atur jarak sesuai kebutuhan */
        }

        /* Menyesuaikan ukuran logo */
        .navbar-brand img {
            max-width: 50px; /* Atur lebar maksimum sesuai keinginan */
            height: auto; /* Agar tinggi mengikuti proporsi gambar */
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    @if (Auth::check())
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('logostudentdata.png') }}" alt="Logo" class="d-inline-block align-text-top">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('siswa.tampil') }}">Data Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">Data Pengguna</a>
                        </li>
                    </ul>

                    {{-- Tombol Logout di sebelah kanan --}}
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif

    {{-- Konten Halaman --}}
    <div class="container mt-4 content"> <!-- Tambahkan kelas content di sini -->
        @yield('konten')
    </div>
</body>

</html>
    
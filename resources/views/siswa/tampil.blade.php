@extends('layout')

@section('konten')
    <style>
        .jenis-laki {
            color: blue;
        }

        .jenis-perempuan {
            color: red;
        }

        /* Menambahkan sedikit spasi antar elemen untuk tampilan lebih rapi */
        .table-responsive {
            margin-top: 20px;
        }

        .d-flex {
            align-items: center;
        }

        .table thead th {
            vertical-align: middle;
        }

        .btn {
            margin-left: 5px;
        }
    </style>

    <div class="d-flex mb-3">
        <h3>List Siswa:</h3>
        <div class="ms-auto">
            <a href="{{ route('siswa.tambah') }}" class="btn btn-success">Tambah Siswa</a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-info text-center">
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Rombel</th>
                    <th>Rayon</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $no => $data)
                    <tr>
                        <td class="text-center">{{ $no + 1 }}</td>
                        <td>{{ $data->nis }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->rombel }}</td>
                        <td>{{ $data->rayon }}</td>
                        <td class="text-center" style="color: {{ $data->jenis_kelamin == 'L' ? 'blue' : 'red' }};">
                            {{ $data->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('siswa.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('siswa.delete', $data->id) }}" method="POST" class="d-inline-block"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini?');">
                                @csrf
                                <button class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@extends('layout')

@section('konten')
    <div class="container mt-5">
        <div class="shadow mb-5 mx-auto p-4" style="max-width: 600px;">
            <h4 class="mb-4 text-center">Edit Data Siswa</h4>

            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    {{-- input nis --}}
                    <label for="nis" class="form-label">NIS</label>
                    <input type="number" name="nis" value="{{ $siswa->nis }}" class="form-control" min="1" required>
                </div>

                <div class="mb-3">
                    {{-- input nama --}}
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" value="{{ $siswa->nama }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    {{-- input rombel --}}
                    <label for="rombel" class="form-label">Rombel</label>
                    <input type="text" name="rombel" value="{{ $siswa->rombel }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    {{-- input rayon --}}
                    <label for="rayon" class="form-label">Rayon</label>
                    <input type="text" name="rayon" value="{{ $siswa->rayon }}" class="form-control" required>
                </div>

                <div class="mb-4">
                    {{-- input jeniskelamin --}}
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select id="jk" name="jk" class="form-select" onchange="setGenderColor()" required>
                        <option value="" hidden>Pilih</option>
                        <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>                

                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary me-2">Edit</button>
                    <a href="{{ route('siswa.tampil') }}" class="btn btn-success">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function setGenderColor() {
            var selectElement = document.getElementById("jk");
            var selectedValue = selectElement.value;

            if (selectedValue === "L") {
                selectElement.style.color = "blue"; // Warna untuk Laki-Laki
            } else if (selectedValue === "P") {
                selectElement.style.color = "red"; // Warna untuk Perempuan
            } else {
                selectElement.style.color = "black"; // Default (untuk berjaga-jaga)
            }
        }

        // Set default color on page load
        document.addEventListener("DOMContentLoaded", function() {
            setGenderColor();
        });
    </script>
@endsection

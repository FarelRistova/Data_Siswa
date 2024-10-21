<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    function tampil()
    {
        $siswa = Siswa::get();
        return view('siswa.tampil', compact('siswa'));
    }

    function tambah()
    {
        return view('siswa.tambah');
    }

    function submit(Request $request)
    {
        $siswa = new Siswa();
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->rombel = $request->rombel;
        $siswa->rayon = $request->rayon;
        $siswa->jenis_kelamin = $request->jk;
        $siswa->save();

        // Validasi data yang masuk
        $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required|string|max:50',
            'rombel' => 'required|string|max:10',
            'rayon' => 'required|string|max:10',
            'jenis_kelamin' => 'required|in:L,P',
        ]);

        // Simpan data siswa
        Siswa::create($request->all());

        // Redirect setelah sukses
        return redirect()->route('siswa.tampil')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    function edit($id)
    {
        $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }

    function update(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->rombel = $request->rombel;
        $siswa->rayon = $request->rayon;
        $siswa->jenis_kelamin = $request->jk;
        $siswa->update();

        // Redirect setelah sukses
        return redirect()->route('siswa.tampil')->with('success', 'Data siswa berhasil diubah.');

    }

    function delete($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('siswa.tampil');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranSiswaController extends Controller
{
    public function index()
    {
        $data['daftar'] = Pendaftaran::orderBy('created_at', 'desc')->get();
        return view('siswa.pendaftaran.index', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_lengkap'     => 'required|string|max:100',
            'ttl'              => 'required|string',
            'alamat'           => 'required|string',
            'kelas'            => 'nullable|string',
            'hobby'            => 'required|string',
            'ekstrakurikuler'  => 'required|string',
        ]);

        // Simpan data
        $data = new Pendaftaran();
        $data->nama_lengkap    = trim($request->nama_lengkap);
        $data->ttl             = trim($request->ttl);
        $data->alamat          = trim($request->alamat);
        $data->kelas           = trim($request->kelas);
        $data->hobby           = trim($request->hobby);
        $data->ekstrakurikuler = trim($request->ekstrakurikuler);
        $data->save();

        return redirect('siswa/pendaftaran/index')->with('success', "Data siswa berhasil ditambahkan.");
    }

    public function edit($id)
    {
        $daftar = Pendaftaran::findOrFail($id);
        return view('siswa.pendaftaran.edit', compact('daftar'));
    }

    public function update(Request $request, $id)
    {
        $daftar = Pendaftaran::findOrFail($id);

        $daftar->nama_lengkap    = trim($request->nama_lengkap);
        $daftar->ttl             = trim($request->ttl);
        $daftar->alamat          = trim($request->alamat);
        $daftar->kelas           = trim($request->kelas);
        $daftar->hobby           = trim($request->hobby);
        $daftar->ekstrakurikuler = trim($request->ekstrakurikuler);
        $daftar->save();

        return redirect('siswa/pendaftaran/index')->with('success', "Data siswa berhasil diperbarui.");
    }

    public function delete($id)
    {
        $daftar = Pendaftaran::findOrFail($id);
        $daftar->delete();

        return redirect('siswa/pendaftaran/index')->with('success', "Data siswa berhasil dihapus.");
    }

}

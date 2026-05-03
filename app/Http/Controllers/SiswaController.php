<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data['siswa'] = Siswa::with('ekstrakurikuler')->get();

        return view('admin.siswa.index', $data);
    }

    public function tambahsiswa()
    {
        $data['ekskul'] = Ekstrakurikuler::all();

        return view('admin.siswa.tambahsiswa', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|digits:10|unique:siswa,nis',
            'kelas' => 'required',
            'ekstrakurikuler_id' => 'required|exists:ekstrakurikuler,id',
        ], [
            'nis.required' => 'NISN wajib diisi',
            'nis.digits' => 'NISN harus 10 digit angka',
            'nis.unique' => 'NISN sudah terdaftar',
        ]);

        $data = new Siswa;
        $data->nama = trim($request->nama);
        $data->nis = trim($request->nis);
        $data->kelas = trim($request->kelas);
        $data->ekstrakurikuler_id = $request->ekstrakurikuler_id;
        $data->save();

        return redirect('admin/siswa/index')->with('success', 'Data siswa berhasil ditambah');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $ekskul = Ekstrakurikuler::all();

        return view('admin.siswa.editsiswa', compact('siswa', 'ekskul'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|digits:10|unique:siswa,nis,'.$id,
            'kelas' => 'required',
            'ekstrakurikuler_id' => 'required|exists:ekstrakurikuler,id',
        ], [
            'nis.required' => 'NISN wajib diisi',
            'nis.digits' => 'NISN harus 10 digit angka',
            'nis.unique' => 'NISN sudah terdaftar',
        ]);

        $siswa = Siswa::findOrFail($id);
        $siswa->nama = trim($request->nama);
        $siswa->nis = trim($request->nis);
        $siswa->kelas = trim($request->kelas);
        $siswa->ekstrakurikuler_id = $request->ekstrakurikuler_id;
        $siswa->save();

        return redirect('admin/siswa/index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    public function delete($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect('admin/siswa/index')->with('success', 'Data siswa berhasil dihapus.');
    }
}

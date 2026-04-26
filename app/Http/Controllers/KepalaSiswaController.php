<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KepalaSiswaController extends Controller
{
    public function index()
    {
        $data['siswa'] = Siswa::with('ekstrakurikuler')->get();
        return view('kasekolah/siswa/index',$data);
    }
    public function tambahsiswa()
    {

        $data['ekskul'] = \App\Models\Ekstrakurikuler::all();
        return view('kasekolah.siswa.tambahsiswa',$data);
    }
    public function store(Request $request)
    {
        $data = new Siswa();
        $data->nama = trim($request->nama);
        $data->nis = trim($request->nis);
        $data->kelas = trim($request->kelas);
        $data->ekstrakurikuler_id = $request->ekstrakurikuler_id; // aktifkan relasi
        $data->save();
        return redirect('kasekolah/siswa/index')->with('success', "Data admin sukses ditambah");
    }
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $ekskul = Ekstrakurikuler::all();
        return view('kasekolah.siswa.editsiswa', compact('siswa','ekskul'));
    }
    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->nama = trim($request->nama);
        $siswa->nis = trim($request->nis);
        $siswa->kelas = trim($request->kelas);
        $siswa->ekstrakurikuler_id = trim($request->ekstrakurikuler_id);
        $siswa->save();

        return redirect('kasekolah/siswa/index')->with('success', "Data siswa berhasil diperbarui.");
    }

    public function delete($id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect('kasekolah/siswa/index')->with('success', "Data siswa berhasil dihapus.");
    }
}

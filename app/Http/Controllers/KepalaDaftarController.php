<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class KepalaDaftarController extends Controller
{
    public function index()
    {
        $data['daftar'] = Pendaftaran::all();
        return view('kasekolah/pendaftaran/index',$data);
    }
    public function tambahdaftar()
    {

        return view('kasekolah.pendaftaran.tambahdaftar');
    }
    public function store(Request $request)
    {
        

        $data = new Pendaftaran();
        $data->nama_lengkap = trim($request->nama_lengkap);
        $data->ttl = trim($request->ttl);
        $data->alamat = trim($request->alamat);
        $data->kelas = trim($request->kelas);
        $data->hobby = trim($request->hobby);
        $data->ekstrakurikuler = trim($request->ekstrakurikuler);
        
        // $data->Id = 1;
        $data->save();

        return redirect('kasekolah/pendaftaran/index')->with('success', "Daftar sukses ditambah");
    }
    public function edit($id)
    {
        $daftar = Pendaftaran::findOrFail($id);
    return view('kasekolah.pendaftaran.edit', compact('daftar'));
    }
    public function update(Request $request, $id)
    {
        $daftar = Pendaftaran::findOrFail($id);
        $daftar->nama_lengkap = trim($request->nama_lengkap);
        $daftar->ttl = trim($request->ttl);
        $daftar->alamat = trim($request->alamat);
        $daftar->kelas = trim($request->kelas);
        $daftar->hobby = trim($request->hobby);
        $daftar->ekstrakurikuler = trim($request->ekstrakurikuler);
        $daftar->save();

        return redirect('kasekolah/pendaftaran/index')->with('success', "Data daftar berhasil diperbarui.");
    }
    public function delete($id)
    {
        $daftar = Pendaftaran::findOrFail($id);
        $daftar->delete();

        return redirect('kasekolah/pendaftaran/index')->with('success', "Data berhasil dihapus.");
    }
}

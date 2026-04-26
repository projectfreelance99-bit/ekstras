<?php

namespace App\Http\Controllers;

use App\Models\NilaiSiswa;
use App\Models\Siswa;
use Illuminate\Http\Request;

class KepalaNilaiController extends Controller
{
    public function index()
    {
        $data = NilaiSiswa::with('siswa')->get();
        return view('kasekolah.nilai_siswa.index', compact('data'));
    }

    public function tambahnilai()
    {
        $siswas = Siswa::all();
        return view('kasekolah.nilai_siswa.tambahnilai', compact('siswas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'ekstrakurikuler' => 'required|string|max:255',
            'nilai' => 'required|integer'
        ]);

        NilaiSiswa::create($request->all());

        return redirect('kasekolah/nilai_siswa/index')->with('success', "Nilai sukses ditambah");
        
    }

    public function show($id)
    {
        $nilai = NilaiSiswa::with('siswa')->findOrFail($id);
        return view('kasekolah.nilai_siswa.show', compact('nilai'));
    }

    public function edit($id)
    {
        $nilai = NilaiSiswa::findOrFail($id);
        $siswas = Siswa::all();
        return view('kasekolah.nilai_siswa.edit', compact('nilai', 'siswas'));
    }

    public function update(Request $request, $id)
    {
        $nilai = NilaiSiswa::findOrFail($id);
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'ekstrakurikuler' => 'required|string|max:255',
            'nilai' => 'required|integer'
        ]);
        $nilai->update($request->all());
        return redirect('kasekolah/nilai_siswa/index')->with('success', "Data sukses diperbarui");
       
    }

    public function delete($id)
    {
        NilaiSiswa::destroy($id);
        return back()->with('success', 'Nilai berhasil dihapus.');
    }

    public function cetak($id)
    {
        $nilai = NilaiSiswa::with('siswa')->findOrFail($id);
        return view('kasekolah.nilai_siswa.cetak', compact('nilai'));
        return redirect('kasekolah/nilai_siswa/index')->with('success', "Data sukses diperbarui");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\AbsenSiswa;
use App\Models\Ekstrakurikuler;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AbsenSiswaController extends Controller
{
    public function index()
    {
        $absensi = AbsenSiswa::with(['siswa', 'ekstrakurikuler'])->get();
        return view('admin.absen_siswa.index', compact('absensi'));
    }
    public function tambahabsen()
    {
        $siswas = Siswa::all();
        $ekskul = Ekstrakurikuler::all();
        return view('admin/absen_siswa/tambahabsen', compact('siswas', 'ekskul'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'ekstrakurikuler_id' => 'required|exists:ekstrakurikuler,id',
            'tanggal_absensi' => 'required|date',
        ]);

        AbsenSiswa::create([
            'siswa_id' => $request->siswa_id,
            'masuk' => $request->masuk,
            'izin' => $request->izin,
            'sakit' => $request->sakit,
            'ekstrakurikuler_id' => $request->ekstrakurikuler_id,
            'tanggal_absensi' => $request->tanggal_absensi,
        ]);

        return redirect('admin/absen_siswa/index')->with('success', "Data sukses ditambah");
    }

    public function edit($id)
    {
        $absen = AbsenSiswa::findOrFail($id);
        $siswas = Siswa::all();
        $ekskul = Ekstrakurikuler::all();
        return view('admin.absen_siswa.edit', compact('absen', 'siswas', 'ekskul'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswa,id',
            'ekstrakurikuler_id' => 'required|exists:ekstrakurikuler,id',
            'tanggal_absensi' => 'required|date',
        ]);

        $absen = AbsenSiswa::findOrFail($id);
        $absen->update([
            'siswa_id' => $request->siswa_id,
            'masuk' => $request->masuk,
            'izin' => $request->izin,
            'sakit' => $request->sakit,
            'ekstrakurikuler_id' => $request->ekstrakurikuler_id,
            'tanggal_absensi' => $request->tanggal_absensi,
        ]);

        return redirect('admin/absen_siswa/index')->with('success', "Data sukses perbarui");
    }

    public function delete($id)
    {
        AbsenSiswa::destroy($id);
        return redirect('admin/absen_siswa/index')->with('success', "Data sukses dihapus");
    }
}

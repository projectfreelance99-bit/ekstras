<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Penjadwalan;
use Illuminate\Http\Request;

class JadwalSiswaController extends Controller
{
    public function index()
    {
        $data['jadwals'] = Ekstrakurikuler::with(['pembina', 'penjadwalan'])->get();
        return view('siswa.jadwal.index', $data);
    }
    public function tambahjadwal()
    {
        $data['ekskul'] = Ekstrakurikuler::all();
        return view('siswa.jadwal.tambahjadwal', $data);
    }
    public function store(Request $request)
    {
         $request->validate([
            'ekstrakurikuler_id' => 'required|exists:ekstrakurikuler,id',
            'hari' => 'required|string|max:50',
            'jam' => 'required|string|max:50',
        ]);
        Penjadwalan::create([
            'ekstrakurikuler_id' => $request->ekstrakurikuler_id,
            'hari' => $request->hari,
            'jam' => $request->jam,
        ]);

        return redirect('siswa/jadwal/index')->with('success', "Data sukses ditambah");
    }
    public function edit($id)
    {
        $jadwal = Penjadwalan::findOrFail($id);
        $ekskul = Ekstrakurikuler::all();
        return view('siswa.jadwal.edit', compact('jadwal', 'ekskul'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'ekstrakurikuler_id' => 'required|exists:ekstrakurikuler,id',
            'hari' => 'required|string|max:50',
            'jam' => 'required|string|max:50',
        ]);

        $jadwal = Penjadwalan::findOrFail($id);
        $jadwal->update($request->only(['ekstrakurikuler_id', 'hari', 'jam']));

        return redirect('siswa/jadwal/index')->with('success', "Data  berhasil diperbarui.");
    }
    public function delete($id)
    {
        $jadwal = Penjadwalan::findOrFail($id);
        $jadwal->delete();

        return redirect('siswa/jadwal/index')->with('success', "Data  berhasil dihapus.");
    }
}

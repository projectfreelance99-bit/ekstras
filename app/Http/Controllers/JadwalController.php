<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use App\Models\Penjadwalan;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $data['jadwals'] = Ekstrakurikuler::with(['pembina', 'penjadwalan'])
            ->whereHas('penjadwalan')
            ->get();

        return view('admin.jadwal.index', $data);
    }

    public function tambahjadwal()
    {
        $data['ekskul'] = Ekstrakurikuler::all();

        return view('admin.jadwal.tambahjadwal', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'ekstrakurikuler_id' => 'required|exists:ekstrakurikuler,id',
            'hari' => 'required|string|max:50',
            'jam' => 'required',
        ]);

        // CEK BENTROK HARI & JAM
        $cek = Penjadwalan::where('hari', $request->hari)
            ->where('jam', $request->jam)
            ->first();

        if ($cek) {
            return back()->withInput()->with('error', 'Jadwal sudah digunakan pada hari dan jam tersebut!');
        }

        // CEK EKSKUL SUDAH PUNYA JADWAL YANG SAMA
        $cekEkskul = Penjadwalan::where('ekstrakurikuler_id', $request->ekstrakurikuler_id)
            ->where('hari', $request->hari)
            ->where('jam', $request->jam)
            ->first();

        if ($cekEkskul) {
            return back()->withInput()->with('error', 'Ekstrakurikuler ini sudah memiliki jadwal tersebut!');
        }

        Penjadwalan::create([
            'ekstrakurikuler_id' => $request->ekstrakurikuler_id,
            'hari' => $request->hari,
            'jam' => $request->jam,
        ]);

        return redirect('admin/jadwal/index')->with('success', 'Data sukses ditambah');
    }

    public function edit($id)
    {
        $jadwal = Penjadwalan::findOrFail($id);
        $ekskul = Ekstrakurikuler::all();

        return view('admin.jadwal.edit', compact('jadwal', 'ekskul'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ekstrakurikuler_id' => 'required|exists:ekstrakurikuler,id',
            'hari' => 'required|string|max:50',
            'jam' => 'required',
        ]);

        // CEK BENTROK (kecuali data sendiri)
        $cek = Penjadwalan::where('hari', $request->hari)
            ->where('jam', $request->jam)
            ->where('id', '!=', $id)
            ->first();

        if ($cek) {
            return back()->withInput()->with('error', 'Jadwal bentrok dengan data lain!');
        }

        // CEK EKSKUL DUPLIKAT (kecuali data sendiri)
        $cekEkskul = Penjadwalan::where('ekstrakurikuler_id', $request->ekstrakurikuler_id)
            ->where('hari', $request->hari)
            ->where('jam', $request->jam)
            ->where('id', '!=', $id)
            ->first();

        if ($cekEkskul) {
            return back()->withInput()->with('error', 'Ekstrakurikuler ini sudah punya jadwal tersebut!');
        }

        $jadwal = Penjadwalan::findOrFail($id);
        $jadwal->update([
            'ekstrakurikuler_id' => $request->ekstrakurikuler_id,
            'hari' => $request->hari,
            'jam' => $request->jam,
        ]);

        return redirect('admin/jadwal/index')->with('success', 'Data berhasil diperbarui.');
    }

    public function delete($id)
    {
        $jadwal = Penjadwalan::findOrFail($id);
        $jadwal->delete();

        return redirect('admin/jadwal/index')->with('success', 'Data berhasil dihapus.');
    }
}

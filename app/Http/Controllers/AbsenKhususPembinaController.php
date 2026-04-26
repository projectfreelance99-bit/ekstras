<?php

namespace App\Http\Controllers;

use App\Models\AbsenPembina;
use App\Models\Pembina;
use Illuminate\Http\Request;

class AbsenKhususPembinaController extends Controller
{
    public function index()
    {
        $absensi = AbsenPembina::with('pembina')->get();
        return view('pembina/absen_pembina/index', compact('absensi'));
    }

    public function verifikasi($id)
    {
        $absen = AbsenPembina::findOrFail($id);
        return view('pembina.absen_pembina.verifikasi', compact('absen'));
    }


    public function updateVerifikasi(Request $request, $id)
    {
        $request->validate([
            'status_verifikasi' => 'required|in:Terverifikasi,Ditolak'
        ]);

        $absen = AbsenPembina::findOrFail($id);
        $absen->status_verifikasi = $request->status_verifikasi;
        $absen->save();

        return redirect('pembina/absen_pembina/index')->with('success', "verifikasi berhasil");
    }

    public function tambahabsen()
    {
        $pembina = Pembina::all();
        return view('pembina/absen_pembina/tambahabsen', compact('pembina'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pembina_id' => 'required|exists:pembina,id',
            'tanggal' => 'required|date',
            'status_absensi' => 'required|in:Hadir,Izin,Sakit',
        ]);

        AbsenPembina::create([
            'pembina_id' => $request->pembina_id,
            'tanggal' => $request->tanggal,
            'status_absensi' => $request->status_absensi,
            'status_verifikasi' => 'Belum Diverifikasi'
        ]);

        return redirect('pembina/absen_pembina/index')->with('success', "Data sukses ditambahkan");
    }

    public function edit($id)
    {
        $absensi = AbsenPembina::findOrFail($id);
        $pembinas = Pembina::all();
        return view('pembina.absen_pembina.edit', compact('absensi', 'pembinas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'pembina_id' => 'required|exists:pembina,id',
            'tanggal' => 'required|date',
            'status_absensi' => 'required|in:Hadir,Izin,Sakit',
            'status_verifikasi' => 'required|string',
        ]);

        $absensi = AbsenPembina::findOrFail($id);
        $absensi->update($request->only([
            'pembina_id',
            'tanggal',
            'status_absensi',
            'status_verifikasi',
        ]));

        return redirect('pembina/absen_pembina/index')->with('success', "Data sukses diperbarui");
    }

    public function delete($id)
    {
        AbsenPembina::destroy($id);
        return redirect('pembina/absen_pembina/index')->with('success', "Data sukses dihapus");
    }
}

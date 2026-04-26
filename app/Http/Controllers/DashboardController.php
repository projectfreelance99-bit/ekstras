<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pembina;
use App\Models\Ekstrakurikuler;
use App\Models\Siswa;
use App\Models\AbsenPembina;
use App\Models\AbsenSiswa;
use App\Models\NilaiSiswa;
use App\Models\Pendaftaran;
use App\Models\Penjadwalan;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = [
        'pembina' => Pembina::count(),
        'ekstrakurikuler' => Ekstrakurikuler::count(),
        'siswa' => Siswa::count(),
        'pendaftar' => Pendaftaran::count(),
        'jadwal' => Penjadwalan::count(),
        'absensiSiswa' => AbsenSiswa::count(),
        'absensiPembina' => AbsenPembina::count(),
        'nilaiSiswa' => NilaiSiswa::count(),
        'totalMasuk' => AbsenSiswa::where('masuk', 'Y')->count(),
        'totalIzin' => AbsenSiswa::where('izin', 'Y')->count(),
        'totalSakit' => AbsenSiswa::where('sakit', 'Y')->count(),
        
    ];
        if (Auth::user()->user_type == 1) {
        return view('admin.dashboard', $data);
    } elseif (Auth::user()->user_type == 2) {
        return view('siswa.dashboard', $data);
    } elseif (Auth::user()->user_type == 3) {
        return view('pembina.dashboard', $data);
    } elseif (Auth::user()->user_type == 4) {
        return view('kasekolah.dashboard', $data);
    }
    }
}

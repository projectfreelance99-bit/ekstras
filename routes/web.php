<?php

use App\Http\Controllers\AbsenKhususPembinaController;
use App\Http\Controllers\AbsenPembinaController;
use App\Http\Controllers\AbsenPembinaSiswaController;
use App\Http\Controllers\AbsensiSiswaController;
use App\Http\Controllers\AbsenSiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\EkskulController;
use App\Http\Controllers\EkstrakurikulerController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JadwalPembinaController;
use App\Http\Controllers\JadwalSiswaController;
use App\Http\Controllers\KepalaAbsenPembinaController;
use App\Http\Controllers\KepalaAbsenSiswaController;
use App\Http\Controllers\KepalaDaftarController;
use App\Http\Controllers\KepalaEkskulController;
use App\Http\Controllers\KepalaJadwalController;
use App\Http\Controllers\KepalaNilaiController;
use App\Http\Controllers\KepalaPembinaController;
use App\Http\Controllers\KepalaSiswaController;
use App\Http\Controllers\MenilaiPembinaController;
use App\Http\Controllers\NilaiSiswaController;
use App\Http\Controllers\PembinaController;
use App\Http\Controllers\PendaftaranSiswaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaNilaiController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini kamu bisa mendefinisikan semua route web untuk aplikasi ini.
|
*/

Route::get('/', function () {
    return view('landing');
});

// Login & Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
// Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);


Route::get('register', [RegisterController::class, 'showRegistrationForm']);
Route::post('register', [RegisterController::class, 'register']);


// Route untuk Admin
Route::group(['middleware' => 'admin'], function () {

    // Dashboard
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    // user
    Route::get('admin/user/index', [UserController::class, 'index']);
    Route::get('admin/user/tambah', [UserController::class, 'tambahuser']);
    Route::post('admin/user/tambah', [UserController::class, 'store']);
    Route::get('admin/user/edit/{id}', [UserController::class, 'edit']);
    Route::post('admin/user/edit/{id}', [UserController::class, 'update']);
    Route::post('admin/user/delete/{id}', [UserController::class, 'delete']);
    //siswa
    Route::get('admin/siswa/index', [SiswaController::class, 'index']);
    Route::get('admin/siswa/tambah', [SiswaController::class, 'tambahsiswa']);
    Route::post('admin/siswa/tambah', [SiswaController::class, 'store']);
    Route::get('admin/siswa/edit/{id}', [SiswaController::class, 'edit']);
    Route::post('admin/siswa/edit/{id}', [SiswaController::class, 'update']);
    Route::post('admin/siswa/delete/{id}', [SiswaController::class, 'delete']);

    // Pendaftaran
    Route::get('admin/pendaftaran/index', [DaftarController::class, 'index']);
    Route::get('admin/pendaftaran/tambah', [DaftarController::class, 'tambahdaftar']);
    Route::post('admin/pendaftaran/tambah', [DaftarController::class, 'store']);
    Route::get('admin/pendaftaran/edit/{id}', [DaftarController::class, 'edit']);
    Route::post('admin/pendaftaran/edit/{id}', [DaftarController::class, 'update']);
    Route::post('admin/pendaftaran/delete/{id}', [DaftarController::class, 'delete']);

    // Ekstrakurikuler
    Route::get('admin/ekskul/index', [EkstrakurikulerController::class, 'index']);
    Route::get('admin/ekskul/tambah', [EkstrakurikulerController::class, 'tambahekskul']);
    Route::post('admin/ekskul/tambah', [EkstrakurikulerController::class, 'store']);
    Route::get('admin/ekskul/edit/{id}', [EkstrakurikulerController::class, 'edit']);
    Route::post('admin/ekskul/edit/{id}', [EkstrakurikulerController::class, 'update']);
    Route::post('admin/ekskul/delete/{id}', [EkstrakurikulerController::class, 'delete']);

    // Pembina
    Route::get('admin/pembina/index', [PembinaController::class, 'index']);
    Route::get('admin/pembina/tambah', [PembinaController::class, 'tambahpembina']);
    Route::post('admin/pembina/tambah', [PembinaController::class, 'store']);
    Route::get('admin/pembina/edit/{id}', [PembinaController::class, 'edit']);
    Route::post('admin/pembina/edit/{id}', [PembinaController::class, 'update']);
    Route::post('admin/pembina/delete/{id}', [PembinaController::class, 'delete']);
    

    //jadwal
    Route::get('admin/jadwal/index', [JadwalController::class, 'index']);
    Route::get('admin/jadwal/tambah', [JadwalController::class, 'tambahjadwal']);
    Route::post('admin/jadwal/tambah', [JadwalController::class, 'store']);
    Route::get('admin/jadwal/edit/{id}', [JadwalController::class, 'edit']);
    Route::post('admin/jadwal/edit/{id}', [JadwalController::class, 'update']);
    Route::delete('admin/jadwal/delete/{id}', [JadwalController::class, 'delete']);
    
    //absen siswa
    Route::get('admin/absen_siswa/index', [AbsenSiswaController::class, 'index']);
    Route::get('admin/absen_siswa/tambah', [AbsenSiswaController::class, 'tambahabsen']);
    Route::post('admin/absen_siswa/tambah', [AbsenSiswaController::class, 'store']);
    Route::get('admin/absen_siswa/edit/{id}', [AbsenSiswaController::class, 'edit']);
    Route::post('admin/absen_siswa/edit/{id}', [AbsenSiswaController::class, 'update']);
    Route::post('admin/absen_siswa/delete/{id}', [AbsenSiswaController::class, 'delete']);
    
    //absen pembina
    Route::get('admin/absen_pembina/index', [AbsenPembinaController::class, 'index']);
    Route::get('admin/absen_pembina/tambah', [AbsenPembinaController::class, 'tambahabsen']);
    Route::post('admin/absen_pembina/tambah', [AbsenPembinaController::class, 'store']);
    Route::get('admin/absen_pembina/edit/{id}', [AbsenPembinaController::class, 'edit']);
    Route::post('admin/absen_pembina/edit/{id}', [AbsenPembinaController::class, 'update']);
    Route::post('admin/absen_pembina/delete/{id}', [AbsenPembinaController::class, 'delete']);

    //verifikasi absen pembina
    Route::get('admin/absen_pembina/verifikasi/{id}', [AbsenPembinaController::class, 'verifikasi'])->name('absen_pembina.verifikasi');
    Route::put('admin/absen_pembina/verifikasi/{id}', [AbsenPembinaController::class, 'updateVerifikasi'])->name('absen_pembina.update_verifikasi');

    //nilai siswa
    Route::get('admin/nilai_siswa/index', [NilaiSiswaController::class, 'index']);
    Route::get('admin/nilai_siswa/tambah', [NilaiSiswaController::class, 'tambahnilai']);
    Route::post('admin/nilai_siswa/tambah', [NilaiSiswaController::class, 'store']);
    Route::get('admin/nilai_siswa/show/{id}', [NilaiSiswaController::class, 'show']);
    Route::get('admin/nilai_siswa/edit/{id}', [NilaiSiswaController::class, 'edit']);
    Route::post('admin/nilai_siswa/edit/{id}', [NilaiSiswaController::class, 'update']);
    Route::post('admin/nilai_siswa/delete/{id}', [NilaiSiswaController::class, 'delete']);
    Route::get('admin/nilai_siswa/cetak/{id}', [NilaiSiswaController::class, 'cetak']);


    

});


Route::group(['middleware'=>'siswa'], function () {
    Route::get('siswa/dashboard', [DashboardController::class, 'dashboard']);

    //pendaftaran
    Route::get('siswa/pendaftaran/index', [PendaftaranSiswaController::class, 'index']);
    Route::post('siswa/pendaftaran/store', [PendaftaranSiswaController::class, 'store']);
    Route::post('siswa/pendaftaran/delete/{id}', [PendaftaranSiswaController::class, 'delete']);
    // Route::get('siswa/pendaftaran/index', [PendaftaranSiswaController::class, 'index']);
    // Route::get('siswa/pendaftaran/tambah', [PendaftaranSiswaController::class, 'tambahdaftar']);
    // Route::post('siswa/pendaftaran/tambah', [PendaftaranSiswaController::class, 'store']);
    // Route::get('siswa/pendaftaran/edit/{id}', [PendaftaranSiswaController::class, 'edit']);
    // Route::post('siswa/pendaftaran/edit/{id}', [PendaftaranSiswaController::class, 'update']);
    // Route::post('siswa/pendaftaran/delete/{id}', [PendaftaranSiswaController::class, 'delete']);
    
    //data siswa
    Route::get('siswa/siswa/index', [DataSiswaController::class, 'index']);
    Route::get('siswa/siswa/tambah', [DataSiswaController::class, 'tambahsiswa']);
    Route::post('siswa/siswa/tambah', [DataSiswaController::class, 'store']);
    Route::get('siswa/siswa/edit/{id}', [DataSiswaController::class, 'edit']);
    Route::post('siswa/siswa/edit/{id}', [DataSiswaController::class, 'update']);
    Route::post('siswa/siswa/delete/{id}', [DataSiswaController::class, 'delete']);
    
    //penjadwalan
    Route::get('siswa/jadwal/index', [JadwalSiswaController::class, 'index']);
    Route::get('siswa/jadwal/tambah', [JadwalSiswaController::class, 'tambahjadwal']);
    Route::post('siswa/jadwal/tambah', [JadwalSiswaController::class, 'store']);
    Route::get('siswa/jadwal/edit/{id}', [JadwalSiswaController::class, 'edit']);
    Route::post('siswa/jadwal/edit/{id}', [JadwalSiswaController::class, 'update']);
    Route::delete('siswa/jadwal/delete/{id}', [JadwalSiswaController::class, 'delete']);
    
    //absen siswa
    Route::get('siswa/absen_siswa/index', [AbsensiSiswaController::class, 'index']);
    Route::post('siswa/absen_siswa/store', [AbsensiSiswaController::class, 'store']);
    // Route::get('siswa/absen_siswa/index', [AbsensiSiswaController::class, 'index']);
    // Route::get('siswa/absen_siswa/tambah', [AbsensiSiswaController::class, 'tambahabsen']);
    // Route::post('siswa/absen_siswa/tambah', [AbsensiSiswaController::class, 'store']);
    // Route::get('siswa/absen_siswa/edit/{id}', [AbsensiSiswaController::class, 'edit']);
    // Route::post('siswa/absen_siswa/edit/{id}', [AbsensiSiswaController::class, 'update']);
    // Route::post('siswa/absen_siswa/delete/{id}', [AbsensiSiswaController::class, 'delete']);
    
    //nilai siswa
    Route::get('siswa/nilai_siswa/index', [SiswaNilaiController::class, 'index']);
    Route::get('siswa/nilai_siswa/tambah', [SiswaNilaiController::class, 'tambahnilai']);
    Route::post('siswa/nilai_siswa/tambah', [SiswaNilaiController::class, 'store']);
    Route::get('siswa/nilai_siswa/show/{id}', [SiswaNilaiController::class, 'show']);
    Route::get('siswa/nilai_siswa/edit/{id}', [SiswaNilaiController::class, 'edit']);
    Route::post('siswa/nilai_siswa/edit/{id}', [SiswaNilaiController::class, 'update']);
    Route::post('siswa/nilai_siswa/delete/{id}', [SiswaNilaiController::class, 'delete']);
    Route::get('siswa/nilai_siswa/cetak/{id}', [SiswaNilaiController::class, 'cetak']);
});

Route::group(['middleware'=>'pembina'], function () {
    Route::get('pembina/dashboard', [DashboardController::class, 'dashboard']);

    //penjadwalan
    Route::get('pembina/jadwal/index', [JadwalPembinaController::class, 'index']);
    Route::get('pembina/jadwal/tambah', [JadwalPembinaController::class, 'tambahjadwal']);
    Route::post('pembina/jadwal/tambah', [JadwalPembinaController::class, 'store']);
    Route::get('pembina/jadwal/edit/{id}', [JadwalPembinaController::class, 'edit']);
    Route::post('pembina/jadwal/edit/{id}', [JadwalPembinaController::class, 'update']);
    Route::delete('pembina/jadwal/delete/{id}', [JadwalPembinaController::class, 'delete']);
    //absen siswa
    Route::get('pembina/absen_siswa/index', [AbsenPembinaSiswaController::class, 'index']);
    Route::get('pembina/absen_siswa/tambah', [AbsenPembinaSiswaController::class, 'tambahabsen']);
    Route::post('pembina/absen_siswa/tambah', [AbsenPembinaSiswaController::class, 'store']);
    Route::get('pembina/absen_siswa/edit/{id}', [AbsenPembinaSiswaController::class, 'edit']);
    Route::post('pembina/absen_siswa/edit/{id}', [AbsenPembinaSiswaController::class, 'update']);
    Route::post('pembina/absen_siswa/delete/{id}', [AbsenPembinaSiswaController::class, 'delete']);
    //absen pembina
    Route::get('pembina/absen_pembina/index', [AbsenKhususPembinaController::class, 'index']);
    Route::get('pembina/absen_pembina/tambah', [AbsenKhususPembinaController::class, 'tambahabsen']);
    Route::post('pembina/absen_pembina/tambah', [AbsenKhususPembinaController::class, 'store']);
    Route::get('pembina/absen_pembina/edit/{id}', [AbsenKhususPembinaController::class, 'edit']);
    Route::post('pembina/absen_pembina/edit/{id}', [AbsenKhususPembinaController::class, 'update']);
    Route::post('pembina/absen_pembina/delete/{id}', [AbsenKhususPembinaController::class, 'delete']);
    //nilai siswa
    Route::get('pembina/nilai_siswa/index', [MenilaiPembinaController::class, 'index']);
    Route::get('pembina/nilai_siswa/tambah', [MenilaiPembinaController::class, 'tambahnilai']);
    Route::post('pembina/nilai_siswa/tambah', [MenilaiPembinaController::class, 'store']);
    Route::get('pembina/nilai_siswa/show/{id}', [MenilaiPembinaController::class, 'show']);
    Route::get('pembina/nilai_siswa/edit/{id}', [MenilaiPembinaController::class, 'edit']);
    Route::post('pembina/nilai_siswa/edit/{id}', [MenilaiPembinaController::class, 'update']);
    Route::post('pembina/nilai_siswa/delete/{id}', [MenilaiPembinaController::class, 'delete']);
    Route::get('pembina/nilai_siswa/cetak/{id}', [MenilaiPembinaController::class, 'cetak']);

});
Route::group(['middleware'=>'kasekolah'], function () {
    Route::get('kasekolah/dashboard', [DashboardController::class, 'dashboard']);

    //data siswa
     Route::get('kasekolah/siswa/index', [KepalaSiswaController::class, 'index']);
    //penjadwalan
    Route::get('kasekolah/pendaftaran/index', [KepalaDaftarController::class, 'index']);
    //absen siswa
    Route::get('kasekolah/ekskul/index', [KepalaEkskulController::class, 'index']);
    //nilai siswa
    Route::get('kasekolah/pembina/index', [KepalaPembinaController::class, 'index']);

    Route::get('kasekolah/jadwal/index', [KepalaJadwalController::class, 'index']);

    Route::get('kasekolah/absen_siswa/index', [KepalaAbsenSiswaController::class, 'index']);

    Route::get('kasekolah/absen_pembina/index', [KepalaAbsenPembinaController::class, 'index']);

    Route::get('kasekolah/nilai_siswa/index', [KepalaNilaiController::class, 'index']);
});

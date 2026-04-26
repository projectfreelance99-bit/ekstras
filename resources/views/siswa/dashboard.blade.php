@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <h1>
      Dashboard
      
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Ucapan Selamat Datang -->
    <div class="callout callout-info">
      <h4>Hai, {{ Auth::user()->name }}!</h4>
      <p>Selamat datang di Sistem Informasi Ekstrakurikuler</p>
      <p>Gunakan fitur berikut untuk memantau kegiatan ekstrakurikuler, pendaftaran, absensi, nilai, dan data siswa.</p>
    </div>

    <!-- Box Statistik -->
    <div class="row">
      <!-- Pendaftaran -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $pendaftar ?? 0 }}</h3>
            <p>Pendaftar Baru</p>
          </div>
          <div class="icon">
            <i class="fa fa-edit"></i>
          </div>
          <a href="{{ url('siswa/pendaftaran/index') }}" class="small-box-footer">
            Lihat Pendaftaran <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Jadwal -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{ $jadwal ?? 0 }}</h3>
            <p>Jadwal Ekstrakurikuler</p>
          </div>
          <div class="icon">
            <i class="fa fa-calendar"></i>
          </div>
          <a href="{{ url('siswa/jadwal/index') }}" class="small-box-footer">
            Lihat Jadwal <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Nilai -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ $nilaiSiswa ?? 0 }}</h3>
            <p>Nilai Siswa</p>
          </div>
          <div class="icon">
            <i class="fa fa-star"></i>
          </div>
          <a href="{{ url('siswa/nilai/index') }}" class="small-box-footer">
            Lihat Nilai <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>

      <!-- Data Siswa -->
      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{ $siswa ?? 0 }}</h3>
            <p>Data Siswa</p>
          </div>
          <div class="icon">
            <i class="fa fa-users"></i>
          </div>
          <a href="{{ url('admin/siswa/index') }}" class="small-box-footer">
            Lihat Data <i class="fa fa-arrow-circle-right"></i>
          </a>
        </div>
      </div>
    </div>

    <!-- Box Statistik Tambahan: Absensi -->
    <div class="row">
      <!-- Total Kehadiran -->
      <div class="col-lg-4 col-xs-12">
        <div class="info-box bg-blue">
          <span class="info-box-icon"><i class="fa fa-check-square-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Masuk</span>
            <span class="info-box-number">{{ $totalMasuk ?? 0 }}</span>
            <a href="{{ url('siswa/absen_siswa') }}" class="small-box-footer text-white">Lihat Absensi <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Total Izin -->
      <div class="col-lg-4 col-xs-12">
        <div class="info-box bg-orange">
          <span class="info-box-icon"><i class="fa fa-exclamation-circle"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Izin</span>
            <span class="info-box-number">{{ $totalIzin ?? 0 }}</span>
            <a href="{{ url('siswa/absen_siswa') }}" class="small-box-footer text-white">Lihat Absensi <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>

      <!-- Total Sakit -->
      <div class="col-lg-4 col-xs-12">
        <div class="info-box bg-maroon">
          <span class="info-box-icon"><i class="fa fa-medkit"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Sakit</span>
            <span class="info-box-number">{{ $totalSakit ?? 0 }}</span>
            <a href="{{ url('siswa/absen_siswa') }}" class="small-box-footer text-white">Lihat Absensi <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>

  </section>
</div>

@endsection

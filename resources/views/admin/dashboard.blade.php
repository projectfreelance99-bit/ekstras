@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Dashboard
      <small>Informasi Sistem</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
          <div class="inner">
            <h3>{{ $pembina }}</h3>
            <p>Data Pembina</p>
          </div>
          <div class="icon">
            <i class="ion ion-person"></i>
          </div>
          <a href="{{ url('admin/pembina') }}" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
          <div class="inner">
            <h3>{{ $ekstrakurikuler }}</h3>
            <p>Ekstrakurikuler</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-football"></i>
          </div>
          <a href="{{ url('admin/ekstrakurikuler') }}" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
          <div class="inner">
            <h3>{{ $siswa }}</h3>
            <p>Data Siswa</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-people"></i>
          </div>
          <a href="{{ url('admin/siswa') }}" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
          <div class="inner">
            <h3>{{ $pendaftar }}</h3>
            <p>Pendaftar</p>
          </div>
          <div class="icon">
            <i class="ion ion-compose"></i>
          </div>
          <a href="{{ url('admin/pendaftar') }}" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-blue">
          <div class="inner">
            <h3>{{ $jadwal }}</h3>
            <p>Jadwal Ekstrakurikuler</p>
          </div>
          <div class="icon">
            <i class="ion ion-calendar"></i>
          </div>
          <a href="{{ url('admin/jadwal') }}" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-maroon">
          <div class="inner">
            <h3>{{ $absensiSiswa }}</h3>
            <p>Absensi Siswa</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-checkmark-circle"></i>
          </div>
          <a href="{{ url('admin/absensi-siswa') }}" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-purple">
          <div class="inner">
            <h3>{{ $absensiPembina }}</h3>
            <p>Absensi Pembina</p>
          </div>
          <div class="icon">
            <i class="ion ion-android-checkbox-outline"></i>
          </div>
          <a href="{{ url('admin/absensi-pembina') }}" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-teal">
          <div class="inner">
            <h3>{{ $nilaiSiswa }}</h3>
            <p>Nilai Siswa</p>
          </div>
          <div class="icon">
            <i class="ion ion-ios-paper"></i>
          </div>
          <a href="{{ url('admin/nilai_siswa') }}" class="small-box-footer">Lihat Detail <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>

    </div>
  </section>
</div>

@endsection

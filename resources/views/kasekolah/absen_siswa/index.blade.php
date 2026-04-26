@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <h1 class="text-primary">
      <i class="fa fa-calendar"></i> Data Absensi Siswa
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Absensi Siswa</li>
    </ol>
  </section>

  <!-- Main Content -->
  <section class="content">
    <div class="box box-primary shadow">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list-ul"></i> Rekapitulasi Absensi</h3>
      </div>

      <div class="box-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-striped table-hover">
            <thead style="background-color: #3c8dbc; color: white;">
              <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Siswa</th>
                <th>Ekstrakurikuler</th>
                <th>Tanggal</th>
                <th class="text-center">Masuk</th>
                <th class="text-center">Izin</th>
                <th class="text-center">Sakit</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($absensi as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong>{{ $data->siswa->nama ?? '-' }}</strong></td>
                <td>{{ $data->ekstrakurikuler->nama ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($data->tanggal_absensi)->format('d M Y') }}</td>
                <td class="text-center">
                  <span class="label label-success">{{ $data->masuk }}</span>
                </td>
                <td class="text-center">
                  <span class="label label-warning">{{ $data->izin }}</span>
                </td>
                <td class="text-center">
                  <span class="label label-danger">{{ $data->sakit }}</span>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="box-footer text-right">
        <small class="text-muted">Terakhir Diperbaru: {{ now()->format('d M Y H:i') }}</small>
      </div>
    </div>
  </section>
</div>

@endsection

@push('styles')
<style>
  .box-title {
    font-weight: 600;
    font-size: 18px;
  }

  @media print {
    .main-footer, .content-header, .btn, .breadcrumb {
      display: none !important;
    }
    .box, .box-body {
      border: none;
      box-shadow: none;
    }
    body {
      font-size: 12pt;
    }
    table {
      font-size: 11pt;
    }
  }
</style>
@endpush

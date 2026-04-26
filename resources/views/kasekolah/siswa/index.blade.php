@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <!-- Header -->
  <section class="content-header">
    <h1 class="text-primary">
      <i class="fa fa-users"></i> Laporan Data Siswa
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Siswa</li>
    </ol>
  </section>

  <!-- Main Content -->
  <section class="content">
    <div class="box box-primary shadow">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list-ul"></i> Daftar Siswa Aktif</h3>
        <div class="box-tools pull-right">
          <button onclick="window.print()" class="btn btn-sm btn-default">
            <i class="fa fa-print"></i> Cetak
          </button>
        </div>
      </div>

      <div class="box-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-striped table-hover">
            <thead style="background-color: #3c8dbc; color: white;">
              <tr>
                <th style="width: 50px;">No</th>
                <th>NISN</th>
                <th>Nama Lengkap</th>
                <th>Kelas</th>
                <th>Ekstrakurikuler</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($siswa as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nis }}</td>
                <td><strong>{{ $data->nama }}</strong></td>
                <td><span class="label label-info">{{ $data->kelas }}</span></td>
                <td>{{ $data->ekstrakurikuler->nama ?? '-' }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="box-footer text-right">
        <small class="text-muted">Terakhir diperbarui: {{ now()->format('d M Y H:i') }}</small>
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
    .content-header,
    .box-tools,
    .main-footer,
    .btn,
    .breadcrumb {
      display: none !important;
    }
    .box {
      box-shadow: none;
      border: none;
    }
    body {
      font-size: 12pt;
    }
    .box-body {
      padding: 0;
    }
    table {
      font-size: 11pt;
    }
  }
</style>
@endpush

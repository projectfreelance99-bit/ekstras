@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <h1>
      <i class="fa fa-file-text-o"></i> Laporan Pendaftaran Siswa
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Laporan Pendaftaran</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title text-bold">Data Siswa yang Telah Mendaftar</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-sm btn-default" onclick="window.print();">
            <i class="fa fa-print"></i> Cetak Laporan
          </button>
        </div>
      </div>

      <div class="box-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-striped">
            <thead class="bg-primary text-white">
              <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Kelas</th>
                <th>Hobi</th>
                <th>Ekstrakurikuler</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($daftar as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->nama_lengkap }}</td>
                <td>{{ $data->ttl }}</td>
                <td>{{ $data->alamat }}</td>
                <td>{{ $data->kelas }}</td>
                <td>{{ $data->hobby }}</td>
                <td>{{ $data->ekstrakurikuler }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="box-footer text-right">
        <small class="text-muted">Dicetak pada {{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</small>
      </div>
    </div>
  </section>
</div>

@endsection

@push('styles')
<style>
  @media print {
    .main-footer, .content-header, .box-tools, .btn, .breadcrumb {
      display: none !important;
    }
    .box {
      border: none;
      box-shadow: none;
    }
    .box-body {
      padding: 0;
    }
    table {
      font-size: 12pt;
    }
  }

  .box-title {
    font-size: 18px;
    font-weight: bold;
  }

  .table thead {
    background-color: #3c8dbc;
    color: white;
  }
</style>
@endpush

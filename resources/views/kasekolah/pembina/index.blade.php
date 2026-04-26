@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <h1 class="text-primary">
      <i class="fa fa-user"></i> Data Pembina
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Pembina</li>
    </ol>
  </section>

  <!-- Main Content -->
  <section class="content">
    <div class="box box-primary shadow">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list-alt"></i> Daftar Pembina Ekstrakurikuler</h3>
      </div>

      <div class="box-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-striped table-hover">
            <thead style="background-color: #3c8dbc; color: white;">
              <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Pembina</th>
                <th>Jenis Kelamin</th>
                <th>No HP</th>
                <th>Alamat</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($pembina as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong>{{ $data->nama_pembina }}</strong></td>
                <td>{{ $data->jenis_kelamin }}</td>
                <td>{{ $data->no_hp }}</td>
                <td>{{ $data->alamat }}</td>
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

  .table thead {
    font-weight: bold;
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

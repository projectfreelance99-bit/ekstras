@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <h1 class="text-primary">
      <i class="fa fa-futbol-o"></i> Data Ekstrakurikuler
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Ekstrakurikuler</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary shadow">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list"></i> Daftar Ekstrakurikuler</h3>
      </div>

      <div class="box-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-striped table-hover">
            <thead style="background-color: #3c8dbc; color: white;">
              <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Kegiatan</th>
                <th>Pembina</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($ekskul as $data)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong>{{ $data->nama }}</strong></td>
                <td>{{ $data->pembina->nama_pembina ?? '-' }}</td>
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
  }
</style>
@endpush

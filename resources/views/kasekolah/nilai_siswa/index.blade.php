@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <h1 class="text-primary">
      <i class="fa fa-graduation-cap"></i> Data Nilai Siswa
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Nilai Siswa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary shadow">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-list-alt"></i> Rekap Nilai Siswa</h3>
      </div>

      <div class="box-body">
        <div class="table-responsive">
          <table id="example2" class="table table-bordered table-striped table-hover">
            <thead style="background-color: #3c8dbc; color: white;">
              <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Siswa</th>
                <th>Ekstrakurikuler</th>
                <th>Nilai</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($data as $nilai)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong>{{ $nilai->siswa->nama ?? '-' }}</strong></td>
                <td>{{ $nilai->ekstrakurikuler }}</td>
                <td>
                  {{ $nilai->nilai }}
                </td>
                <td>{{ \Carbon\Carbon::parse($nilai->created_at)->format('d M Y') }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="box-footer text-right">
        <small class="text-muted">Terakhir Diperbarui: {{ now()->format('d M Y H:i') }}</small>
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

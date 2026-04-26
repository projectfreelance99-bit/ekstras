@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <!-- Header -->
  <section class="content-header">
    <h1 class="text-primary">
      <i class="fa fa-calendar-check-o"></i> Data Absensi Pembina
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Absensi Pembina</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary shadow">
      <div class="box-header with-border">
        <h3 class="box-title"><i class="fa fa-clock-o"></i> Rekapitulasi Absensi</h3>
        <div class="box-tools pull-right">
          {{-- <a href="{{ url('kasekolah/absen_pembina/tambah') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Absensi</a> --}}
        </div>
      </div>

      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
            <thead style="background-color: #3c8dbc; color: white;">
              <tr>
                <th style="width: 50px;">No</th>
                <th>Nama Pembina</th>
                <th>Tanggal</th>
                <th>Status Absensi</th>
                <th>Status Verifikasi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($absensi as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td><strong>{{ $item->pembina->nama_pembina ?? '-' }}</strong></td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d M Y') }}</td>
                <td>
                  
                    {{ $item->status_absensi }}
                  
                </td>
                <td>
                  <span class="label label-{{ $item->status_verifikasi == 'Terverifikasi' ? 'primary' : 'default' }}">
                    {{ $item->status_verifikasi }}
                  </span>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="box-footer text-right">
        <small class="text-muted"> terakhir Diperbarui: {{ now()->format('d M Y H:i') }}</small>
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

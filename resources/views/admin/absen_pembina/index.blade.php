@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>Data Absensi Pembina</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Absensi Pembina</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data Absensi</h3>
            <a href="{{ url('admin/absen_pembina/tambah') }}" class="btn btn-primary pull-right"><b>Tambah Absensi</b></a>
          </div>

          <div class="box-body">
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pembina</th>
                  <th>Tanggal</th>
                  <th>Status</th>
                  <th>Verifikasi</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($absensi as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->pembina->nama_pembina ?? '-' }}</td>
                  <td>{{ $item->tanggal }}</td>
                  <td>{{ $item->status_absensi }}</td>
                  <td>{{ $item->status_verifikasi }}</td>
                  <td>
                    <a href="{{ url('admin/absen_pembina/verifikasi', $item->id) }}" class="btn btn-sm btn-warning">Verifikasi</a>
                    <a href="{{ url('admin/absen_pembina/edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                    <form action="{{ url('admin/absen_pembina/delete/' . $item->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>

@endsection

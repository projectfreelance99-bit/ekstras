@extends('layouts.app')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Absensi Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Data Absensi</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Absensi</h3>
              <a href="{{ url('admin/absen_siswa/tambah') }}" class="btn btn-primary pull-right"><b>Tambah Absensi</b></a>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Ekstrakurikuler</th>
                    <th>Tanggal</th>
                    <th>Masuk</th>
                    <th>Izin</th>
                    <th>Sakit</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($absensi as $data)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->siswa->nama ?? '-' }}</td>
                      <td>{{ $data->ekstrakurikuler->nama ?? '-' }}</td>
                      <td>{{ $data->tanggal_absensi }}</td>
                      <td>{{ $data->masuk }}</td>
                      <td>{{ $data->izin }}</td>
                      <td>{{ $data->sakit }}</td>
                      <td>
                        <a href="{{ url('admin/absen_siswa/edit', $data->id) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ url('admin/absen_siswa/delete/' . $data->id) }}" method="POST" style="display:inline-block;">
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
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection
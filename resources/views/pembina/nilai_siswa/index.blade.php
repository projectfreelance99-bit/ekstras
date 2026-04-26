@extends('layouts.app')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Nilai Siswa
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Data Nilai Siswa</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Nilai Siswa</h3>
              <a href="{{ url('pembina/nilai_siswa/tambah') }}" class="btn btn-primary pull-right"><b>Tambah Nilai</b></a>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Ekstrakurikuler</th>
                    <th>Nilai</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($data as $nilai)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $nilai->siswa->nama ?? '-' }}</td>
                      <td>{{ $nilai->ekstrakurikuler }}</td>
                      <td>{{ $nilai->nilai }}</td>
                      <td>{{ \Carbon\Carbon::parse($nilai->created_at)->format('d/m/Y') }}</td>
                      <td>
                        <a href="{{ url('pembina/nilai_siswa/show', $nilai->id) }}" class="btn btn-sm btn-info">
                          <i class="fa fa-eye"></i>
                        </a>
                        <a href="{{ url('pembina/nilai_siswa/edit', $nilai->id) }}" class="btn btn-sm btn-warning">
                          <i class="fa fa-edit"></i>
                        </a>
                        <form action="{{ url('pembina/nilai_siswa/delete', $nilai->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                            <i class="fa fa-trash"></i>
                          </button>
                        </form>
                        <a href="{{ url('pembina/nilai_siswa/cetak', $nilai->id) }}" target="_blank" class="btn btn-sm btn-success">
                          <i class="fa fa-print"></i>
                        </a>
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
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection



@extends('layouts.app')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Siswa yang Telah Mendaftar 
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"></a>Daftar Siswa</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      {{-- <a href="#" class="btn btn-primary "><b>Tambah Siswa</b></a> --}}
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daftar Siswa</h3> <a href="{{ url('admin/pendaftaran/tambah') }}" class="btn btn-primary "><b>Daftar</b></a>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>Tempat, Tanggal Lahir</th>
                  <th>Alamat</th>
                  <th>Kelas</th>
                  <th>Hobby</th>
                  <th>Ekstrakurikuler</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($daftar as $data )
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama_lengkap	 }}</td>
                    <td>{{ $data->ttl }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->kelas	 }}</td>
                    <td>{{ $data->hobby }}</td>
                    <td>{{ $data->ekstrakurikuler }}</td>
                    <td>{{ $data->status }}</td>
                    <td>
                      <a href="{{ url('admin/pendaftaran/edit/'.$data->id) }}" class="btn btn-sm btn-info">
                        <i class="fa fa-edit"></i>
                      </a>
                      <form action="{{ url('admin/pendaftaran/delete/' . $data->id) }}" method="POST" style="display:inline-block;">
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

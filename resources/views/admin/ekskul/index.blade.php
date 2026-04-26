

@extends('layouts.app')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Ekstrakurikuler
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"></a>Data Ekstrakurikuler</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      {{-- <a href="#" class="btn btn-primary "><b>Tambah Siswa</b></a> --}}
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data EKtrakurikuler</h3>
              <a href="{{ url('admin/ekskul/tambah') }}" class="btn btn-primary pull-right"><b>Tambah Ekskul</b></a>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kegiatan</th>
                  <th>Pembina</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($ekskul as $data )
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->pembina->nama_pembina ?? '-' }}</td>
                    <td>
                      <a href="{{ url('admin/ekskul/edit/'.$data->id) }}" class="btn btn-sm btn-info">
                        <i class="fa fa-edit"></i>
                      </a>
                      
                      <form action="{{ url('admin/ekskul/delete', $data->id) }}" method="POST" style="display:inline-block;">
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

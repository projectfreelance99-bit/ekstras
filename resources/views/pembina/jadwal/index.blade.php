

@extends('layouts.app')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Jadwal Ekstrakurikuler
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#"></a>Data Jadwal Ekstrakurikuler</li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      {{-- <a href="#" class="btn btn-primary "><b>Tambah Siswa</b></a> --}}
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Jadwal</h3>
              <a href="{{ url('pembina/jadwal/tambah') }}" class="btn btn-primary pull-right"><b>Tambah Jadwal</b></a>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Pembina</th>
                    <th>Jadwal</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($jadwals as $data)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $data->nama }}</td>
                      <td>{{ $data->pembina->nama_pembina ?? '-' }}</td>
                      <td>
                        @if($data->penjadwalan->isEmpty())
                          <em>- Tidak ada jadwal -</em>
                        @else
                          <ul class="list-unstyled">
                            @foreach($data->penjadwalan as $jadwal)
                              <li>{{ $jadwal->hari }} - {{ $jadwal->jam }}</li>
                            @endforeach
                          </ul>
                        @endif
                      </td>
                      <td>
                        @if($data->penjadwalan->isEmpty())
                          <em>-</em>
                        @else
                          <ul class="list-unstyled" style="padding-left: 0; margin: 0;">
                            @foreach($data->penjadwalan as $jadwal)
                              <li style="margin-bottom: 5px;">
                                <a href="{{ url('pembina/jadwal/edit/'.$jadwal->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{ url('pembina/jadwal/delete/'.$jadwal->id) }}" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-danger">Hapus</a>
                              </li>
                            @endforeach
                          </ul>
                        @endif
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

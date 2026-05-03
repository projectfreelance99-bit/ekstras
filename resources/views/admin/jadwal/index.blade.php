@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data Jadwal Ekstrakurikuler
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Jadwal Ekstrakurikuler</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

          <div class="box-header">
            <h3 class="box-title">Data Jadwal</h3>
            <a href="{{ url('admin/jadwal/tambah') }}" class="btn btn-primary pull-right">
              <b>Tambah Jadwal</b>
            </a>
          </div>

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

                    {{-- JADWAL --}}
                    <td>
                      @if($data->penjadwalan->count())
                        @foreach($data->penjadwalan as $jadwal)
                          <span class="label label-primary">
                            {{ $jadwal->hari }} - {{ $jadwal->jam }}
                          </span>
                          &nbsp;
                        @endforeach
                      @else
                        <span class="text-muted">Belum ada jadwal</span>
                      @endif
                    </td>

                    {{-- ACTION (SUDAH DIRAPIKAN, TIDAK TUMPAH) --}}
                    <td>
                      @if($data->penjadwalan->count())

                        @php
                          $firstJadwal = $data->penjadwalan->first();
                        @endphp

                        <a href="{{ url('admin/jadwal/edit/'.$firstJadwal->id) }}" class="btn btn-sm btn-info">
                          Edit
                        </a>

                        <form action="{{ url('admin/jadwal/delete/'.$firstJadwal->id) }}" method="POST" style="display:inline-block;">
                          @csrf
                          @method('DELETE')

                          <button type="submit"
                              class="btn btn-sm btn-danger"
                              onclick="return confirm('Yakin ingin menghapus jadwal ini?')">
                              Hapus
                          </button>
                        </form>

                      @else
                        <span class="text-muted">-</span>
                      @endif
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

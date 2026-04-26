@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <!-- Content Header -->
  <section class="content-header">
    <h1>Data Absensi Siswa</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Absensi</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#data" data-toggle="tab">Daftar Absensi</a></li>
        <li><a href="#form" data-toggle="tab">Tambah Absensi</a></li>
      </ul>

      <div class="tab-content">
        <!-- Tabel Absensi -->
        <div class="tab-pane active" id="data">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Data Absensi</h3>
            </div>
            <div class="box-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Ekstrakurikuler</th>
                    <th>Tanggal</th>
                    <th>Masuk</th>
                    <th>Izin</th>
                    <th>Sakit</th>
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
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Form Tambah Absensi -->
        <div class="tab-pane" id="form">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Tambah Absensi</h3>
            </div>

            <form method="POST" action="{{ url('siswa/absen_siswa/store') }}">
              @csrf
              <div class="box-body">

                <div class="form-group">
                  <label>Nama Siswa <span class="text-danger">*</span></label>
                  <select name="siswa_id" class="form-control" required>
                    <option value="">-- Pilih Siswa --</option>
                    @foreach($siswas as $siswa)
                      <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                    @endforeach
                  </select>
                  <div class="text-danger">{{ $errors->first('siswa_id') }}</div>
                </div>

                <div class="form-group">
                  <label>Ekstrakurikuler <span class="text-danger">*</span></label>
                  <select name="ekstrakurikuler_id" class="form-control" required>
                    <option value="">-- Pilih Ekstrakurikuler --</option>
                    @foreach($ekskul as $item)
                      <option value="{{ $item->id }}">{{ $item->nama }}</option>
                    @endforeach
                  </select>
                  <div class="text-danger">{{ $errors->first('ekstrakurikuler_id') }}</div>
                </div>

                <div class="form-group">
                  <label>Tanggal Absensi <span class="text-danger">*</span></label>
                  <input type="date" name="tanggal_absensi" class="form-control" value="{{ old('tanggal_absensi') }}" required>
                  <div class="text-danger">{{ $errors->first('tanggal_absensi') }}</div>
                </div>

                <div class="form-group">
                  <label>Keterangan Kehadiran</label><br>
                  <label><input type="radio" name="masuk" value="Y"> Masuk</label>&nbsp;&nbsp;
                  <label><input type="radio" name="izin" value="Y"> Izin</label>&nbsp;&nbsp;
                  <label><input type="radio" name="sakit" value="Y"> Sakit</label>
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-default">Reset</button>
              </div>
            </form>
          </div>
        </div> <!-- end tab-pane -->
      </div> <!-- end tab-content -->
    </div> <!-- end nav-tabs-custom -->
  </section>
</div>
@endsection

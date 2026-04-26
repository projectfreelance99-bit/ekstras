@extends('layouts.app')

@section('content')

<div class="content-wrapper">
  <!-- Header -->
  <section class="content-header">
    <h1><i class="fa fa-users"></i> Pendaftaran & Data Siswa</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Pendaftaran Siswa</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <!-- Form Pendaftaran -->
      <div class="col-md-4">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-pencil"></i> Form Pendaftaran</h3>
          </div>
          <form method="POST" action="{{ url('siswa/pendaftaran/store') }}">
            @csrf
            <div class="box-body">
              <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" value="{{ old('nama_lengkap') }}" required>
              </div>
              <div class="form-group">
                <label>Tempat, Tanggal Lahir</label>
                <input type="text" name="ttl" class="form-control" value="{{ old('ttl') }}" required>
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}" required>
              </div>
              <div class="form-group">
                <label>Kelas</label>
                <input type="text" name="kelas" class="form-control" value="{{ old('kelas') }}">
              </div>
              <div class="form-group">
                <label>Hobby</label>
                <input type="text" name="hobby" class="form-control" value="{{ old('hobby') }}">
              </div>
              <div class="form-group">
                <label>Ekstrakurikuler</label>
                <select name="ekstrakurikuler" class="form-control select2" required>
                  <option value="">-- Pilih --</option>
                  @php
                    $ekskul = ['pramuka','paduan suara','Band','Voli','Basket','Sepak Bola','Tenis Meja','Kaligrafi','Bela Diri','PMR','Hadrah'];
                  @endphp
                  @foreach ($ekskul as $item)
                    <option value="{{ $item }}" {{ old('ekstrakurikuler') == $item ? 'selected' : '' }}>{{ $item }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="box-footer">
              <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
            </div>
          </form>
        </div>
      </div>

      <!-- Daftar Siswa -->
      <div class="col-md-8">
        <div class="box box-success">
          <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-list"></i> Daftar Siswa</h3>
          </div>
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-striped table-hover">
              <thead style="background-color:#3c8dbc; color:white;">
                <tr>
                  <th>No</th>
                  <th>Nama Lengkap</th>
                  <th>TTL</th>
                  <th>Alamat</th>
                  <th>Kelas</th>
                  <th>Hobby</th>
                  <th>Ekskul</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($daftar as $data)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $data->nama_lengkap }}</td>
                  <td>{{ $data->ttl }}</td>
                  <td>{{ $data->alamat }}</td>
                  <td>{{ $data->kelas }}</td>
                  <td>{{ $data->hobby }}</td>
                  <td>{{ $data->ekstrakurikuler }}</td>
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

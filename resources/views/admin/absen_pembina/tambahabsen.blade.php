@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Absensi Pembina</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Absensi Pembina</a></li>
      <li class="active">Tambah</li>
    </ol>
  </section>

  <section class="content">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">Form Tambah Absensi</h3>
      </div>

      <form action="{{ url('admin/absen_pembina/tambah') }}" method="POST">
        @csrf
        <div class="box-body">
          <div class="form-group">
            <label for="pembina_id">Nama Pembina</label>
            <select name="pembina_id" class="form-control" required>
              <option value="">-- Pilih Pembina --</option>
              @foreach ($pembina as $data)
                <option value="{{ $data->id }}">{{ $data->nama_pembina }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="status_absensi">Status Absensi</label>
            <select name="status_absensi" class="form-control" required>
              <option value="Hadir">Hadir</option>
              <option value="Izin">Izin</option>
              <option value="Sakit">Sakit</option>
            </select>
          </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ url('admin/absensi_pembina/index') }}" class="btn btn-default">Kembali</a>
        </div>
      </form>
    </div>
  </section>
</div>
@endsection

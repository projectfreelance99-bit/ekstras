@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Absensi Siswa</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Absensi Siswa</a></li>
      <li class="active">Edit Absensi</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Edit Absensi</h3>
          </div>

          <form method="POST" action="">
            @csrf
            <div class="box-body">

              <div class="form-group">
                <label for="siswa_id">Nama Siswa</label>
                <select name="siswa_id" class="form-control" required>
                  <option value="">-- Pilih Siswa --</option>
                  @foreach($siswas as $siswa)
                    <option value="{{ $siswa->id }}" {{ $absen->siswa_id == $siswa->id ? 'selected' : '' }}>
                      {{ $siswa->nama }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="ekstrakurikuler_id">Ekstrakurikuler</label>
                <select name="ekstrakurikuler_id" class="form-control" required>
                  <option value="">-- Pilih Ekstrakurikuler --</option>
                  @foreach($ekskul as $item)
                    <option value="{{ $item->id }}" {{ $absen->ekstrakurikuler_id == $item->id ? 'selected' : '' }}>
                      {{ $item->nama }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="tanggal_absensi">Tanggal Absensi</label>
                <input type="date" name="tanggal_absensi" class="form-control" value="{{ old('tanggal_absensi', $absen->tanggal_absensi) }}" required>
              </div>

              <div class="form-group">
                <label>Status Kehadiran</label><br>
                <label><input type="radio" name="masuk" value="Y" {{ $absen->masuk == 'Y' ? 'checked' : '' }}> Masuk</label>&nbsp;&nbsp;
                <label><input type="radio" name="izin" value="Y" {{ $absen->izin == 'Y' ? 'checked' : '' }}> Izin</label>&nbsp;&nbsp;
                <label><input type="radio" name="sakit" value="Y" {{ $absen->sakit == 'Y' ? 'checked' : '' }}> Sakit</label>
              </div>

            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="{{ url('admin/absen') }}" class="btn btn-default">Kembali</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection

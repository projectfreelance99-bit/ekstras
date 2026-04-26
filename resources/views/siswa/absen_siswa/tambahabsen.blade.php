@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Tambah Absensi Siswa
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Data Absensi</a></li>
      <li class="active">Tambah Absensi</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Absensi</h3>
          </div>

          <form method="POST" action="">
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
                <div style="color:red">{{ $errors->first('siswa_id') }}</div>
              </div>

              <div class="form-group">
                <label>Ekstrakurikuler <span class="text-danger">*</span></label>
                <select name="ekstrakurikuler_id" class="form-control" required>
                  <option value="">-- Pilih Ekstrakurikuler --</option>
                  @foreach($ekskul as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                  @endforeach
                </select>
                <div style="color:red">{{ $errors->first('ekstrakurikuler_id') }}</div>
              </div>

              <div class="form-group">
                <label>Tanggal Absensi <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_absensi" class="form-control" value="{{ old('tanggal_absensi') }}" required>
                <div style="color:red">{{ $errors->first('tanggal_absensi') }}</div>
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
              <a href="{{ url('siswa/absen_siswa/index') }}" class="btn btn-default">Kembali</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </section>
</div>

@endsection

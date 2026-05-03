@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Tambah Jadwal Ekstrakurikuler
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Data Jadwal</a></li>
      <li class="active">Tambah Jadwal</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Jadwal</h3>
          </div>

          <!-- 🔥 TAMBAHAN ERROR GLOBAL -->
          @if(session('error'))
            <div class="alert alert-danger" style="margin:10px;">
              {{ session('error') }}
            </div>
          @endif

          <form method="POST" action="{{ url('admin/jadwal/tambah') }}">
            @csrf

            <div class="box-body">

              <div class="form-group">
                <label>Ekstrakurikuler <span class="text-danger">*</span></label>
                <select class="form-control" name="ekstrakurikuler_id" required>
                  <option value="">-- Pilih Ekstrakurikuler --</option>
                  @foreach($ekskul as $item)
                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                  @endforeach
                </select>
                <div style="color:red">{{ $errors->first('ekstrakurikuler_id') }}</div>
              </div>

              <div class="form-group">
                <label>Hari <span class="text-danger">*</span></label>
                <select name="hari" class="form-control" required>
                  <option value="">-- Pilih Hari --</option>
                  <option value="Senin">Senin</option>
                  <option value="Selasa">Selasa</option>
                  <option value="Rabu">Rabu</option>
                  <option value="Kamis">Kamis</option>
                  <option value="Jumat">Jumat</option>
                  <option value="Sabtu">Sabtu</option>
                </select>
                <div style="color:red">{{ $errors->first('hari') }}</div>
              </div>

              <div class="form-group">
                <label>Jam <span class="text-danger">*</span></label>
                <input type="time" name="jam" class="form-control" required value="{{ old('jam') }}">
                <div style="color:red">{{ $errors->first('jam') }}</div>
              </div>

            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

          </form>

        </div>

      </div>
    </div>
  </section>
</div>

@endsection

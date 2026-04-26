@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Absensi Pembina</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('absensi_pembina.index') }}">Absensi Pembina</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>

  <section class="content">
    <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Form Edit Absensi</h3>
      </div>

      <form action="" method="POST">
        @csrf
        {{-- @method('PUT') --}}
        <div class="box-body">
          <div class="form-group">
            <label for="pembina_id">Nama Pembina</label>
            <select name="pembina_id" class="form-control" required>
              <option value="">-- Pilih Pembina --</option>
              @foreach ($pembinas as $p)
                <option value="{{ $p->id }}" {{ $absensi->pembina_id == $p->id ? 'selected' : '' }}>{{ $p->nama_pembina }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" value="{{ $absensi->tanggal }}" required>
          </div>

          <div class="form-group">
            <label for="status_absensi">Status Absensi</label>
            <select name="status_absensi" class="form-control" required>
              <option value="Hadir" {{ $absensi->status_absensi == 'Hadir' ? 'selected' : '' }}>Hadir</option>
              <option value="Izin" {{ $absensi->status_absensi == 'Izin' ? 'selected' : '' }}>Izin</option>
              <option value="Sakit" {{ $absensi->status_absensi == 'Sakit' ? 'selected' : '' }}>Sakit</option>
            </select>
          </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-warning">Update</button>
          <a href="{{ url('admin/absensi_pembina/index') }}" class="btn btn-default">Batal</a>
        </div>
      </form>
    </div>
  </section>
</div>
@endsection

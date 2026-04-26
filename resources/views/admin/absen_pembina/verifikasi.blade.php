@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>Verifikasi Absensi Pembina</h1>
  </section>

  <section class="content">
    <div class="box box-primary">
      <form method="POST" action="">
        @csrf
        @method('PUT')

        <div class="box-body">
          <div class="form-group">
            <label>Nama Pembina</label>
            <input type="text" class="form-control" value="{{ $absen->pembina->nama_pembina ?? '-' }}" readonly>
          </div>
          <div class="form-group">
            <label>Tanggal</label>
            <input type="text" class="form-control" value="{{ $absen->tanggal }}" readonly>
          </div>
          <div class="form-group">
            <label>Status Absensi</label>
            <input type="text" class="form-control" value="{{ $absen->status_absensi }}" readonly>
          </div>
          <div class="form-group">
            <label>Status Verifikasi</label>
            <select name="status_verifikasi" class="form-control" required>
              <option value="">-- Pilih Status --</option>
              <option value="Terverifikasi" {{ $absen->status_verifikasi == 'Terverifikasi' ? 'selected' : '' }}>Terverifikasi</option>
              <option value="Ditolak" {{ $absen->status_verifikasi == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
            </select>
          </div>
        </div>

        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ url('admin/absen_pembina/index') }}" class="btn btn-default">Kembali</a>
        </div>
      </form>
    </div>
  </section>
</div>

@endsection

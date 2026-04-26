@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah Nilai Siswa</h1>
  </section>

  <section class="content">
    <div class="box box-primary">
      <div class="box-body">
        <form action="" method="POST">
          @csrf
          <div class="form-group">
            <label for="siswa_id">Nama Siswa</label>
            <select name="siswa_id" class="form-control" required>
              <option value="">-- Pilih Siswa --</option>
              @foreach($siswas as $siswa)
              <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="ekstrakurikuler">Ekstrakurikuler</label>
            <input type="text" name="ekstrakurikuler" class="form-control" required>
          </div>

          <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" name="nilai" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ url('pembina/nilai_siswa/index') }}" class="btn btn-default">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

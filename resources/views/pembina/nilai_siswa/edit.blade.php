@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Nilai Siswa</h1>
  </section>

  <section class="content">
    <div class="box box-primary">
      <div class="box-body">
        <form action="" method="POST">
          @csrf
          <div class="form-group">
            <label for="siswa_id">Nama Siswa</label>
            <select name="siswa_id" class="form-control" required>
              @foreach($siswas as $siswa)
              <option value="{{ $siswa->id }}" {{ $siswa->id == $nilai->siswa_id ? 'selected' : '' }}>
                {{ $siswa->nama }}
              </option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="ekstrakurikuler">Ekstrakurikuler</label>
            <input type="text" name="ekstrakurikuler" class="form-control" value="{{ $nilai->ekstrakurikuler }}" required>
          </div>

          <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" name="nilai" class="form-control" value="{{ $nilai->nilai }}" required>
          </div>

          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ url('pembina/nilai_siswa/index') }}" class="btn btn-default">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</div>
@endsection

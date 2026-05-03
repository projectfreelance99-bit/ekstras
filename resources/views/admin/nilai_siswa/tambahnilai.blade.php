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
            <select name="siswa_id" id="siswa_id" class="form-control" required>
              <option value="">-- Pilih Siswa --</option>
              @foreach($siswas as $siswa)
              <option value="{{ $siswa->id }}"
                      data-ekskul="{{ $siswa->ekstrakurikuler->nama ?? '-' }}">
                {{ $siswa->nama }}
              </option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="ekstrakurikuler">Ekstrakurikuler</label>
            <input type="text" name="ekstrakurikuler" id="ekstrakurikuler" class="form-control" required readonly>
          </div>

          <div class="form-group">
            <label for="nilai">Nilai</label>
            <input type="number" name="nilai" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ url('admin/nilai_siswa/index') }}" class="btn btn-default">Kembali</a>

        </form>
      </div>
    </div>
  </section>
</div>

<script>
document.getElementById('siswa_id').addEventListener('change', function() {
    let selected = this.options[this.selectedIndex];
    let ekskul = selected.getAttribute('data-ekskul');

    document.getElementById('ekstrakurikuler').value = ekskul ?? '';
});
</script>

@endsection

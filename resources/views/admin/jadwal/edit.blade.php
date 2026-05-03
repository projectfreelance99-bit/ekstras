@extends('layouts.app')
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit Jadwal Ekstrakurikuler</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="#">Jadwal Ekstrakurikuler</a></li>
      <li class="active">Edit Jadwal</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">

        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Form Edit Jadwal</h3>
          </div>

          <!-- 🔥 ERROR VALIDASI -->
          @if(session('error'))
            <div class="alert alert-danger" style="margin:10px;">
              {{ session('error') }}
            </div>
          @endif

          <form method="POST" action="">
            @csrf
            @method('PUT')

            <div class="box-body">

              <div class="form-group">
                <label for="ekstrakurikuler_id">Ekstrakurikuler</label>
                <select name="ekstrakurikuler_id" class="form-control" required>
                  <option value="">-- Pilih Ekstrakurikuler --</option>
                  @foreach($ekskul as $item)
                    <option value="{{ $item->id }}" {{ $jadwal->ekstrakurikuler_id == $item->id ? 'selected' : '' }}>
                      {{ $item->nama }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="hari">Hari</label>
                <select name="hari" class="form-control" required>
                  <option value="">-- Pilih Hari --</option>
                  @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                    <option value="{{ $hari }}" {{ $jadwal->hari == $hari ? 'selected' : '' }}>
                      {{ $hari }}
                    </option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="jam">Jam</label>
                <input type="time" class="form-control" name="jam" value="{{ old('jam', $jadwal->jam) }}" required>
              </div>

            </div>

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Update</button>
              <a href="{{ url('admin/jadwal/index') }}" class="btn btn-default">Kembali</a>
            </div>

          </form>

        </div>

      </div>
    </div>
  </section>
</div>

@endsection

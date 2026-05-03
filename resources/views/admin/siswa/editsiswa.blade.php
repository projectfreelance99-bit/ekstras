@extends('layouts.app')
@section('content')

 <div class="content-wrapper">

    <section class="content-header">
      <h1>
        Tambah Data Siswa
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data Siswa</a></li>
        <li class="active">Tambah Data</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data</h3>
            </div>

            <form method="POST" action="{{ url('admin/siswa/edit/'.$siswa->id) }}">
               @csrf
              <div class="box-body">

                <div class="form-group">
                  <label>NIS <span class="text-danger">*</span></label>
                  <input type="text" class="form-control"
                         value="{{ old('nis',$siswa->nis) }}"
                         name="nis"
                         placeholder="nis"
                         maxlength="10"
                         inputmode="numeric"
                         oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                  <div style="color:red">{{ $errors->first('nis') }}</div>
                </div>

                <div class="form-group">
                  <label>Nama Lengkap <span class="text-danger">*</span></label>
                  <input type="text" class="form-control"
                         value="{{ old('nama',$siswa->nama) }}"
                         name="nama"
                         placeholder="nama">
                  <div style="color:red">{{ $errors->first('nama') }}</div>
                </div>

                <div class="form-group">
                  <label>kelas <span class="text-danger">*</span></label>
                  <input type="text" class="form-control"
                         value="{{ old('kelas',$siswa->kelas) }}"
                         name="kelas"
                         placeholder="kelas">
                  <div style="color:red">{{ $errors->first('kelas') }}</div>
                </div>

                <div class="form-group">
                  <label for="ekstrakurikuler_id">Ekstrakurikuler</label>
                  <select name="ekstrakurikuler_id" class="form-control" required>
                      <option value="">-- Pilih --</option>
                      @foreach($ekskul as $item)
                          <option value="{{ $item->id }}" {{ $siswa->ekstrakurikuler_id == $item->id ? 'selected' : '' }}>
                              {{ $item->nama }}
                          </option>
                      @endforeach
                  </select>
                </div>

              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

            </form>
          </div>

        </div>
      </div>
    </section>
  </div>

@endsection

@extends('layouts.app')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <section class="content-header">
      <h1>
        Tambah Data Ekstrakurikuler
        {{-- <small>Preview</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data Ektrakurikuler</a></li>
        <li class="active">Tambah Kegiatan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Kegiatan</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  method="POST" action="">
               @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Pembina <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="nama_pembina" value="{{ old('nama_pembina') }}" required placeholder="Nama">
                  <div style="color:red">{{ $errors->first('nama_pembina') }}</div>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin<span class="text-danger">*</span></label>
                  <label for="jenis_kelamin"><i class="fas fa-layer-group"></i></label>
                  <select class="form-control select2" name="jenis_kelamin" id="jenis_kelamin" required>
                    <option value="">-- Jenis Kelamin --</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                    
                    
                  </select>
                  <div style="color:red">{{ $errors->first('jenis_kelamin') }}</div>
                </div>
                <div class="form-group">
                  <label>No HP<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="no_hp" value="{{ old('no_hp') }}" required placeholder="nomor hp">
                  <div style="color:red">{{ $errors->first('no_hp') }}</div>
                </div>
                <div class="form-group">
                  <label>Alamat<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required placeholder="alamat">
                  <div style="color:red">{{ $errors->first('alamat') }}</div>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

          <!-- Form Element sizes -->
          

        </div>
        
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

@endsection
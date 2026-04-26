@extends('layouts.app')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <section class="content-header">
      <h1>
        Log Pendaftaran
        {{-- <small>Preview</small> --}}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Daftar Siswa</a></li>
        <li class="active">Daftar</li>
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
              <h3 class="box-title">Pendaftaran</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  method="POST" action="">
               @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Lengkap <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required placeholder="nama lengkap">
                  <div style="color:red">{{ $errors->first('nama_lengkap') }}</div>
                </div>
                <div class="form-group">
                  <label>Tempat, Tanggal Lahir <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="ttl" value="{{ old('ttl') }}" required placeholder="ttl">
                  <div style="color:red">{{ $errors->first('ttl') }}</div>
                </div>
                <div class="form-group">
                  <label>Alamat <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}" required placeholder="Alamat">
                  <div style="color:red">{{ $errors->first('alamat	') }}</div>
                </div>
                <div class="form-group">
                  <label>Kelas <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="kelas" value="{{ old('kelas') }}" placeholder="kelas">
                  <div style="color:red">{{ $errors->first('kelas') }}</div>
                </div>
                <div class="form-group">
                  <label>Hobby <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" name="hobby" value="{{ old('hobby') }}" required placeholder="hobby">
                  <div style="color:red">{{ $errors->first('hobby') }}</div>
                </div>
                <div class="form-group">
                  <label>Ekstrakurikuler yang dipilih <span class="text-danger">*</span></label>
                  <label for="ekstrakurikuler"><i class="fas fa-layer-group"></i></label>
                  <select class="form-control select2" name="ekstrakurikuler" id="ekstrakurikuler" required>
                    <option value="">-- Pilih Ekstrakurikuler --</option>
                    <option value="pramuka">pramuka</option>
                    <option value="paduan suara">paduan suara</option>
                    <option value="Band">Band</option>
                    <option value="Voli">Voli</option>
                    <option value="Basket">Basket</option>
                    <option value="Sepak Bola">Sepak Bola</option>
                    <option value="Tenis Meja">Tenis Meja</option>
                    <option value="Kaligrafi">Kaligrafi</option>
                    <option value="Bela Diri">Bela Diri</option>
                    <option value="PMR">PMR</option>
                    <option value="Hadrah">Hadrah</option>
                    
                  </select>
                  <div style="color:red">{{ $errors->first('ekstrakurikuler') }}</div>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Daftar</button>
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
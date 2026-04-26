@extends('layouts.app')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
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

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  method="POST" action="">
               @csrf
              <div class="box-body">
                <div class="form-group">
                  <label>Nama Lengkap <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" value="{{ old('nama_lengkap',$daftar->nama_lengkap) }}" name="nama_lengkap" placeholder="nama_lengkap">
                  <div style="color:red">{{ $errors->first('nama_lengkap') }}</div>
                </div>
                <div class="form-group">
                  <label>TTL <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" value="{{ old('ttl',$daftar->ttl) }}" name="ttl"  placeholder="ttl">
                  <div style="color:red">{{ $errors->first('ttl') }}</div>
                </div>
                <div class="form-group">
                  <label>Alamat <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" value="{{ old('alamat',$daftar->alamat) }}" name="alamat"  placeholder="alamat">
                  <div style="color:red">{{ $errors->first('alamat') }}</div>
                </div>
                <div class="form-group">
                  <label>Kelas <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" value="{{ old('kelas',$daftar->kelas) }}" name="kelas" placeholder="kelas">
                  <div style="color:red">{{ $errors->first('kelas') }}</div>
                </div>
                <div class="form-group">
                  <label>Hobby <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" value="{{ old('hobby',$daftar->hobby) }}" name="hobby" placeholder="hobby">
                  <div style="color:red">{{ $errors->first('hobby') }}</div>
                </div>
                <div class="form-group">
                  <label>Ekstrakurikuler <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" value="{{ old('ekstrakurikuler',$daftar->ekstrakurikuler) }}" name="ekstrakurikuler" placeholder="ekstrakurikuler">
                  <div style="color:red">{{ $errors->first('ekstrakurikuler') }}</div>
                </div>
                {{-- <div class="form-group">
                  <label>wali kelas</label>
                  <input type="text" class="form-control" placeholder="Enter ...">
                </div> --}}
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
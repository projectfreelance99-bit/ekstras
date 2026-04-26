@extends('layouts.app')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <section class="content-header">
      <h1>
        Tambah Data Pembina
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data Pembina</a></li>
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
                  <label>Nama Pembina <span class="text-danger">*</span></label>
                  <input type="nama_pembina" class="form-control" value="{{ old('nama_pembina',$pembina->nama_pembina) }}" name="nama_pembina" placeholder="nama_pembina">
                  <div style="color:red">{{ $errors->first('nis') }}</div>
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin<span class="text-danger">*</span></label>
                  <input type="jenis_kelamin" class="form-control" value="{{ old('jenis_kelamin',$pembina->jenis_kelamin) }}" name="jenis_kelamin"  placeholder="jenis_kelamin">
                  <div style="color:red">{{ $errors->first('jenis_kelamin') }}</div>
                </div>
                <div class="form-group">
                  <label>No HP <span class="text-danger">*</span></label>
                  <input type="no_hp" class="form-control" value="{{ old('no_hp',$pembina->no_hp) }}" name="no_hp"  placeholder="no_hp">
                  <div style="color:red">{{ $errors->first('no_hp') }}</div>
                </div>
                <div class="form-group">
                  <label>Alamat <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" value="{{ old('alamat',$pembina->alamat) }}" name="alamat" placeholder="alamat">
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
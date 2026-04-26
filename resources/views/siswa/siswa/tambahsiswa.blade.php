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
                  <input type="nama" class="form-control" name="nama" value="{{ old('nama') }}" required placeholder="nama">
                  <div style="color:red">{{ $errors->first('nama') }}</div>
                </div>
                <div class="form-group">
                  <label>NISN <span class="text-danger">*</span></label>
                  <input type="nis" class="form-control" name="nis" value="{{ old('nis') }}" required placeholder="nis">
                  <div style="color:red">{{ $errors->first('nis') }}</div>
                </div>
                <div class="form-group">
                  <label>kelas <span class="text-danger">*</span></label>
                  <input type="kelas" class="form-control" name="kelas" value="{{ old('kelas') }}" required placeholder="kelas">
                  <div style="color:red">{{ $errors->first('kelas') }}</div>
                </div>
                <div class="form-group">
                  <label for="ekstrakurikuler_id">Ekstrakurikuler</label>
                  <select name="ekstrakurikuler_id" class="form-control" required>
                      <option value="">-- Pilih --</option>
                      @foreach($ekskul as $item)
                          <option value="{{ $item->id }}">{{ $item->nama }}</option>
                      @endforeach
                  </select>
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
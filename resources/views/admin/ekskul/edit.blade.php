@extends('layouts.app')
@section('content')

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   
    <section class="content-header">
      <h1>
        Ekstrakurikuler
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Data Ekstrakurikuler</a></li>
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
                  <label>Ekstrakurikuler <span class="text-danger">*</span></label>
                  <input type="nama" class="form-control" value="{{ old('nama',$ekskul->nama) }}" name="nama" placeholder="ekstrakurikuler">
                  <div style="color:red">{{ $errors->first('nis') }}</div>
                </div>
                <div class="form-group">
                  <label>Pembina</label>
                  <select name="pembina_id" class="form-control" required>

                      @foreach($pembinas as $pembina)
                          <option value="{{ $pembina->id }}" {{ $ekskul->pembina_id == $pembina->id ? 'selected' : '' }}>{{ $pembina->nama_pembina }}</option>
                      @endforeach
                      {{-- @foreach ($pembina as $p)
                <option value="{{ $p->id }}" {{ $data->pembina_id == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
              @endforeach --}}
                  </select>
                </div>
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
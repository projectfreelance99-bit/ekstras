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
                  <label>Kegiatan<span class="text-danger">*</span></label>
                  {{-- <input type="text" class="form-control" name="nama" value="{{ old('nama') }}" required placeholder="kegiatan"> --}}
                  <label for="nama"><i class="fas fa-layer-group"></i></label>
                  <select class="form-control select2" name="nama" id="nama" required>
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
                  <div style="color:red">{{ $errors->first('nama') }}</div>
                </div>
                <div class="form-group">
                  <label>Pembina</label>
                  <select name="pembina_id" class="form-control" required>
                      <option value="">-- Pilih Pembina --</option>
                      @foreach($pembinas as $pembina)
                          <option value="{{ $pembina->id }}">{{ $pembina->nama_pembina }}</option>
                      @endforeach
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
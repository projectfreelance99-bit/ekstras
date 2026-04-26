@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Tambah User</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('admin/user/index') }}">Data User</a></li>
      <li class="active">Tambah</li>
    </ol>
  </section>

  <section class="content">
    <form action="" method="POST">
      @csrf
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Tambah User</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Tipe User</label>
            <select name="user_type" class="form-control" required>
              <option value="1">Admin</option>
              <option value="2">Siswa</option>
              <option value="3">Pembina</option>
              <option value="4">Kepala Sekolah</option>
            </select>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <a href="{{ url('admin/user/index') }}" class="btn btn-default">Kembali</a>
        </div>
      </div>
    </form>
  </section>
</div>
@endsection

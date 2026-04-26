@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Edit User</h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a href="{{ url('admin/user/index') }}">Data User</a></li>
      <li class="active">Edit</li>
    </ol>
  </section>

  <section class="content">
    <form action="" method="POST">
      @csrf
      {{-- @method('PUT') --}}
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form Edit User</h3>
        </div>
        <div class="box-body">
          <div class="form-group">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" value="{{ $user->email }}" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="form-group">
            <label>Tipe User</label>
            <select name="user_type" class="form-control" required>
              <option value="1" {{ $user->user_type == 1 ? 'selected' : '' }}>Admin</option>
              <option value="2" {{ $user->user_type == 2 ? 'selected' : '' }}>Siswa</option>
              <option value="3" {{ $user->user_type == 3 ? 'selected' : '' }}>Pembina</option>
              <option value="4" {{ $user->user_type == 4 ? 'selected' : '' }}>Kepala Sekolah</option>
            </select>
          </div>
        </div>
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          <a href="{{ url('admin.users.index') }}" class="btn btn-default">Kembali</a>
        </div>
      </div>
    </form>
  </section>
</div>
@endsection

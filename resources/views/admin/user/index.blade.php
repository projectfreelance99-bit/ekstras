@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Data User
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data User</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h3 class="box-title">Data User</h3>
            <a href="{{ url('admin/user/tambah') }}" class="btn btn-primary pull-right"><b>Tambah User</b></a>
          </div>

          <div class="box-body">
            @if (session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Peran</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $types = [1 => 'Admin', 2 => 'Siswa', 3 => 'Pembina', 4 => 'Kepala Sekolah'];
                @endphp
                @foreach ($users as $user)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $types[$user->user_type] ?? '-' }}</td>
                  <td>
                    <a href="{{ url('admin/user/edit', $user->id) }}" class="btn btn-sm btn-info">
                      <i class="fa fa-edit"></i>
                    </a>
                    <form action="{{ url('admin.user.delete', $user->id) }}" method="POST" style="display:inline-block;">
                      @csrf
                      @method('DELETE')
                      <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                        <i class="fa fa-trash"></i>
                      </button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </section>
</div>
@endsection

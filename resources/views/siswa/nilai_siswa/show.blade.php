@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <section class="content-header">
    <h1>Detail Nilai Siswa</h1>
  </section>

  <section class="content">
    <div class="box box-info">
      <div class="box-body">
        <table class="table table-bordered">
          <tr>
            <th>Nama Siswa</th>
            <td>{{ $nilai->siswa->nama }}</td>
          </tr>
          <tr>
            <th>Ekstrakurikuler</th>
            <td>{{ $nilai->ekstrakurikuler }}</td>
          </tr>
          <tr>
            <th>Nilai</th>
            <td>{{ $nilai->nilai }}</td>
          </tr>
          <tr>
            <th>Tanggal Input</th>
            <td>{{ \Carbon\Carbon::parse($nilai->created_at)->format('d-m-Y H:i') }}</td>
          </tr>
        </table>
        <a href="{{ url('siswa/nilai_siswa/index') }}" class="btn btn-default">Kembali</a>
      </div>
    </div>
  </section>
</div>
@endsection

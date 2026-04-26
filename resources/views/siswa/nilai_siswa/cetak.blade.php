<!DOCTYPE html>
<html>
<head>
  <title>Cetak Nilai Siswa</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .container { width: 80%; margin: auto; }
    table { width: 100%; border-collapse: collapse; margin-top: 20px; }
    th, td { border: 1px solid #000; padding: 8px; text-align: left; }
    h2 { text-align: center; }
    @media print {
      .no-print { display: none; }
    }
  </style>
</head>
<body onload="window.print()">
  <div class="container">
    <h2>Data Nilai Siswa</h2>
    <table>
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
        <th>Tanggal</th>
        <td>{{ \Carbon\Carbon::parse($nilai->created_at)->format('d/m/Y H:i') }}</td>
      </tr>
    </table>
    <br>
    <p style="text-align:right;">Bondowoso, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
  </div>
</body>
</html>

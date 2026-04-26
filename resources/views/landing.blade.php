<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ekstrakurikuler MTsN 2 Bondowoso</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }
    .hero {
      background: linear-gradient(135deg, #4f46e5, #3b82f6);
      color: #fff;
      padding: 100px 0;
      text-align: center;
    }
    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
    }
    .features .icon {
      font-size: 3rem;
      color: #3b82f6;
    }
    .btn-cta {
      padding: 12px 32px;
      font-size: 1.2rem;
    }
    .footer {
      background-color: #1f2937;
      color: #fff;
      padding: 30px 0;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container">
      <a class="navbar-brand fw-bold text-primary" href="#">
        <img src="{{ url('logo.png') }}" alt="Logo" height="40" class="me-2">

        <i class="bi bi-stars me-2"></i>MTsN 2 Bondowoso
      </a>
      <div>
        <a href="{{ url('/login') }}" class="btn btn-primary">Login</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="container">
      <h1 class="mb-3">Sistem Informasi Ekstrakurikuler</h1>
      <p class="lead mb-4">Platform modern untuk memudahkan manajemen kegiatan ekstrakurikuler siswa.</p>
      {{-- <a href="#" class="btn btn-light btn-cta shadow">Daftar Sekarang</a> --}}
    </div>
  </section>

  <!-- Features -->
  <section class="features py-5">
    <div class="container">
      <h2 class="text-center fw-bold mb-5 text-dark">Fitur Unggulan</h2>
      <div class="row text-center">
        <div class="col-md-4 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <div class="icon mb-3"><i class="bi bi-cloud-check-fill"></i></div>
              <h5 class="card-title fw-bold">Terintegrasi</h5>
              <p class="card-text">Semua data kegiatan, siswa, dan pembina dalam satu sistem.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <div class="icon mb-3"><i class="bi bi-clock-history"></i></div>
              <h5 class="card-title fw-bold">Real-Time</h5>
              <p class="card-text">Pantau jadwal, absensi, dan nilai siswa secara langsung.</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card border-0 shadow-sm h-100">
            <div class="card-body">
              <div class="icon mb-3"><i class="bi bi-globe2"></i></div>
              <h5 class="card-title fw-bold">Akses Online</h5>
              <p class="card-text">Dapat diakses oleh siswa dan pembina kapan saja di mana saja.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <p class="mb-0">&copy; {{ date('Y') }} MTsN 2 Bondowoso. Sistem Informasi Ekstrakurikuler.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

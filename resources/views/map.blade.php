<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Peta Kampus</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      background: linear-gradient(#EECFC0, #F6F6F6);
      background-attachment: fixed;
      background-size: cover;
    }

    #map {
      height: 80vh;
      width: 100%;
      border-radius: 10px;
    }

    .navbar-nav .nav-link {
      color: #EECFC0 !important;
      width: 40px;
      height: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover::before {
      content: '';
      position: absolute;
      width: 40px;
      height: 40px;
      background: white;
      border-radius: 50%;
      z-index: -1;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

    .navbar-nav .nav-link:hover i {
      color: #332318 !important;
    }

    .navbar-nav .nav-link.active::after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 50%;
      transform: translateX(-50%);
      width: 6px;
      height: 6px;
      background-color: white;
      border-radius: 50%;
    }

    .search-box {
      position: relative;
      max-width: 500px;
    }

    .search-box input {
      padding-left: 2.5rem;
      border-radius: 5px;
    }

    .search-box i {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
    }

    .navbar-nav .nav-item {
          position: relative;
      }

      .navbar-nav .nav-link {
          color: #EECFC0 !important;
          transition: all 0.3s ease;
          display: flex;
          justify-content: center;
          align-items: center;
          width: 40px;
          height: 40px;
          position: relative;
          z-index: 1;
      }

      /* Lingkaran background saat hover */
      .navbar-nav .nav-link:hover::before {
          content: '';
          position: absolute;
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          width: 40px;
          height: 40px;
          background-color: white;
          border-radius: 50%;
          z-index: -1;
      }

      /* Efek hover untuk ikon */
      .navbar-nav .nav-link:hover i {
          color: #332318 !important;
      }

      /* Indikator aktif */
      .navbar-nav .nav-link.active::after {
          content: '';
          position: absolute;
          bottom: -8px;
          left: 50%;
          transform: translateX(-50%);
          width: 6px;
          height: 6px;
          background-color: white;
          border-radius: 50%;
      }
  </style>
</head>
<body>

 <div class="container mt-4">
  <h3 class="mb-3">Pencarian Make Up Artist</h3>
  <form action="{{ route('address') }}" method="GET">
    <div class="search-box d-flex">
      <input id="autocomplete" class="form-control border border-dark" type="text" placeholder="Cari lokasi..." name="search" aria-label="Search" value="{{ request('search') }}">
      <button type="submit" class="btn btn-primary">
        <i class="bi bi-search"></i>
      </button>
    </div>
  </form>
</div>


@foreach ($artist as $item)
<div class="card mt-3">
  <div class="card-body">
    <div class="d-flex align-items-center"> <!-- Tambahkan flex container -->
      <div class="me-3"> <!-- Beri margin kanan untuk foto -->
        <img src="{{ asset('image/foto-cewek-2.jpg') }}" 
             alt="{{ $item->name }}" 
             class="rounded-circle object-fit-cover shadow-sm" 
             style="width: 70px; height: 70px; object-fit: cover;">
      </div>
      <div> <!-- Container untuk teks -->
        <h5 class="card-title mb-0">{{ $item->name }}</h5>
        <!-- Anda bisa tambahkan elemen lain di sini -->
        <small class="text-muted">{{ $item->category }}</small>
      </div>
      <div class="ms-auto"> <!-- Tambahkan margin kiri otomatis untuk mendorong ke kanan -->
        <a href="#" class="btn btn-primary">
          <i class="bi bi-geo-alt-fill"></i> Lihat Lokasi
        </a>
      </div>
    </div>
  </div>
</div>
@endforeach

  {{-- Component Navbar Bottom (Bisa dilihat di folder components) --}}
  {{-- Navbar Bottom --}}
  <x-navbar></x-navbar>


  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  {{-- Script Leaflet.js --}}
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</body>
</html>

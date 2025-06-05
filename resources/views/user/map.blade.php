<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Peta Kampus</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      background: linear-gradient(#EECFC0, #F6F6F6);
      background-attachment: fixed;
      background-size: cover;
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
          top: 50%;
          left: 50%;
          transform: translate(-50%, -50%);
          width: 40px;
          height: 40px;
          background-color: white;
          border-radius: 50%;
          z-index: -1;
      }

      .navbar-nav .nav-link.active i {
          color: #332318 !important;
      }

       .search-form {
        margin-top: 0.5rem;
    }
    
    #autocomplete:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        border-color: #86b7fe;
        outline: 0;
    }
    
    .input-group {
        transition: all 0.3s ease;
    }
    
    .input-group:focus-within {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }

    .artist-list {
        max-width: 85%;
        margin: 25px auto;
    }
    
    .card {
        border-radius: 10px;
        border: none;
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    
    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1) !important;
    }
    
    .badge {
        font-weight: 500;
        padding: 0.35em 0.65em;
    }
    
    @media (max-width: 576px) {
        .card-body {
            padding: 1rem !important;
        }
        
        .d-flex {
            flex-wrap: wrap;
        }
        
        .flex-grow-1 {
            width: 100%;
            margin-top: 10px;
        }
        
        .flex-shrink-0.ms-3 {
            margin-left: auto !important;
            margin-top: 10px;
        }
    }
    
    @media (max-width: 768px) {
        .input-group {
            max-width: 100% !important;
        }
    }
  </style>
</head>
<body>

    <div class="container mt-4">
    <h3 class="mb-3 fw-semibold">Pencarian Make Up Artist</h3>
    <form action="{{ route('address') }}" method="GET" class="search-form">
        <div class="input-group shadow-sm rounded-3 overflow-hidden" style="max-width: 600px;">
            <input id="autocomplete" 
                   class="form-control border-end-0 py-2 ps-3" 
                   type="search" 
                   placeholder="Cari lokasi..." 
                   name="search" 
                   aria-label="Cari lokasi Make Up Artist"
                   value="{{ request('search') }}"
                   autocomplete="off">
            <button type="submit" 
                    class="btn btn-primary px-3" 
                    aria-label="Tombol pencarian">
                <i class="bi bi-search fs-5"></i>
            </button>
        </div>
    </form>
</div>

  @if ($artist->isEmpty())
    <div class="container mt-4">
        <div class="alert alert-info d-flex align-items-center" role="alert">
            <i class="bi bi-info-circle-fill me-2"></i>
            <div>Tidak ada lokasi yang ditemukan.</div>
        </div>
    </div>
@else
    <div class="artist-list">
        @foreach ($artist as $item)
        <div class="card mb-3 shadow-sm">
            <div class="card-body p-3">
                <div class="d-flex align-items-center">
                    <!-- Artist Avatar -->
                    <div class="flex-shrink-0 me-3">
                        <img src="{{ asset($item->profile_photo ?? 'image/foto-cewek-2.jpg') }}" 
                            alt="{{ $item->name }}" 
                            class="rounded-circle object-fit-cover border border-light" 
                            style="width: 70px; height: 70px; object-fit: cover;">
                    </div>
                    
                    <!-- Artist Info -->
                    <div class="flex-grow-1">
                        <h5 class="card-title mb-1 fw-semibold">{{ $item->name }}</h5>
                        <div class="d-flex flex-wrap align-items-center">
                            <span class="badge bg-primary me-2 mb-1">{{ $item->category }}</span>
                            <small class="text-muted mb-1">
                                <i class="bi bi-geo-alt"></i>{{ $item->address->kota }}, {{ $item->address->alamat ?? '' }}
                            </small>
                        </div>
                    </div>
                    
                    <!-- Action Button -->
                    <div class="flex-shrink-0 ms-3">
                        <a href="{{ $item->address->link_map }}" 
                           class="btn btn-outline-primary btn-sm" 
                           target="_blank">
                            <i class="bi bi-geo-alt-fill me-1"></i> Lokasi
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endif


  {{-- Component Navbar Bottom (Bisa dilihat di folder components) --}}
  {{-- Navbar Bottom --}}
  <x-navbar></x-navbar>


  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  {{-- Script Leaflet.js --}}
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</body>
</html>

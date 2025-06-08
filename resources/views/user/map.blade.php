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
      background: linear-gradient(#DFDBDC, #E6DBD9, #E4CFCE, #D3CEE5);
      background-attachment: fixed;
      background-size: cover;
    }

     .navbar-brand {
        font-family: 'DM Serif Display', serif;
        font-weight: 100;
        font-style: normal;
        color: #A87648;
        font-size: 20px;
        margin-left: 12px; /* Added to match container padding */
      }
      
      .nav-link {
        font-weight: 500;
        font-family: 'Inter', sans-serif;
        font-size: 20px;
      }

      .nav-link:hover {
        font-color: #A87648 !important;
      }

      .right-navbar .nav-link {
        color: #000000 !important;
        font-weight: 500;
        margin: 0 15px;
        transition: color 0.3s ease;
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

    {{-- Navbar --}}
      <x-navbar/>

    <div class="container mt-4">
    <h3 class="mb-3 fw-semibold">Pencarian Make Up Artist</h3>
    <form action="{{ route('address') }}" method="GET" class="search-form">
        <div class="input-group shadow-sm rounded-3 overflow-hidden" style="max-width: 600px; background-color: #F2E6E8; border-radius: 20px;">
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
                <div class="card-body p-3 border border-dark" style="background-color: #F2E6E8; border-radius: 15px; object-fit:cover; overflow:hidden; min-width: 100%">
                    <div class="d-flex align-items-center">
                        <!-- Artist Avatar -->
                        <div class="flex-shrink-0 me-3">
                            <img src="{{ asset($item->profile_photo ?? 'image/foto-cewek-2.jpg') }}" 
                                alt="{{ $item->name }}" 
                                class="rounded-circle object-fit-cover border border-dark" 
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


  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  {{-- Script Leaflet.js --}}
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</body>
</html>

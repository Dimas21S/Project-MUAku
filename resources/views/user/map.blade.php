<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Location</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
    }

    body{
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
        width: 80%;
        max-width: 100%;
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
    
    /* Filter Group Styles */
    .filter-group {
        margin: 20px auto;
        max-width: 85%;
        padding: 15px;
        border-radius: 15px;
    }
    
    .filter-options {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        justify-content: center;
    }
    
    .filter-btn {
        border: 1px solid #ddd;
        background: white;
        border-radius: 20px;
        padding: 8px 18px;
        font-size: 14px;
        transition: all 0.3s ease;
        cursor: pointer;
    }
    
    .filter-btn:hover {
        background-color: #f8f1eb;
        border-color: #A87648;
    }
    
    .filter-btn.active {
        background-color: #A87648;
        color: white;
        border-color: #A87648;
    }

    main{
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    footer {
    flex-shrink: 0;
    width: 100%;
    background-color: #f8f9fa; /* Sesuaikan dengan warna yang diinginkan */
    padding: 20px 0;
    bottom: 0; /* Ini akan mendorong footer ke bawah */
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
        
        .filter-btn {
            padding: 6px 12px;
            font-size: 13px;
        }
    }
    
    @media (max-width: 768px) {
        .input-group {
            max-width: 100% !important;
        }
        
        .filter-options {
            gap: 8px;
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
                            class="btn btn-cream px-3" 
                            aria-label="Tombol pencarian">
                        <i class="bi bi-search fs-5"></i>
                    </button>
                </div>
            </form>
    </div>

    <div class="filter-group">
        <form action="{{ route('address') }}" method="GET" class="search-form">
            <div class="filter-options">
                <x-filter-button value="all" label="Semua Lokasi" :active="request('location') == 'all'"/>
                <x-filter-button value="alam-barajo" label="Alam Barajo" :active="request('location') == 'alam-barajo'"/>
                <x-filter-button value="jambi-timur" label="Jambi Timur" :active="request('location') == 'jambi-timur'"/>
                <x-filter-button value="telanaipura" label="Telanaipura" :active="request('location') == 'telanaipura'"/>
                <x-filter-button value="jambi-selatan" label="Jambi Selatan" :active="request('location') == 'jambi-selatan'"/>
                <x-filter-button value="pasar" label="Pasar" :active="request('location') == 'pasar'"/>
            </div>
        </form>
    </div>

    <main>
  @if ($artist->isEmpty())
    <div class="container mt-4">
        <div class="alert alert-warning d-flex align-items-center p-4" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-3 fs-4"></i>
            <div>
                <h5 class="alert-heading mb-2">Lokasi Tidak Ditemukan</h5>
                <p class="mb-0">Maaf, kami tidak dapat menemukan kata kunci yang Anda cari. Silakan coba dengan kata kunci yang berbeda atau periksa kembali ejaan.</p>
            </div>
        </div>
    </div>
    @else
        <div class="artist-list">
            @foreach ($artist as $item)
                <x-artist-list :item="$item" />
            @endforeach
        </div>
    @endif
    </main>

    <x-footer/>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    // Filter button functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        
        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons in this group
                const filterGroup = this.closest('.filter-options');
                filterGroup.querySelectorAll('.filter-btn').forEach(b => {
                    b.classList.remove('active');
                });
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Get filter value
                const filterValue = this.getAttribute('data-value');
                const filterType = this.getAttribute('data-filter');
                
                // Here you would typically filter your content
                console.log(`Filter by ${filterType}: ${filterValue}`);
                // Implement your filtering logic here
            });
        });
    });
  </script>
</body>
</html>
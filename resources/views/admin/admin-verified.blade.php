<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Pengguna Berlangganan</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Red+Hat+Display:wght@400;700&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    body {
      min-height: 100vh;
      background-image: url('{{ asset('image/foto-makeup.jpg') }}');
      background-size: cover;
      background-position: center 48%;
      font-family: 'DM Serif Display', serif;
    }

    .user-card {
      width: 100%;
      height: 70px;
      background-color: white;
      border-radius: 10px;
      padding: 15px;
      margin-bottom: 15px;
      cursor: pointer;
      transition: 0.3s;
    }

    .user-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .verified-badge {
      color: #28a745;
      font-size: 0.8rem;
      margin-left: 10px;
    }

    .modal-content {
      border-radius: 15px;
    }

    .user-avatar {
      width: 80px;
      height: 80px;
      border-radius: 50%;
      object-fit: cover;
      margin: 0 auto 15px;
      display: block;
    }

    .navbar-nav .nav-link {
      color: #EECFC0 !important;
      transition: 0.3s;
      width: 40px;
      height: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      z-index: 1;
    }

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

     .portfolio-icon {
      cursor: pointer;
      color: #6c757d;
      transition: all 0.3s;
    }
    
    .portfolio-icon:hover {
      color: #332318;
      transform: scale(1.1);
    }
    
    .portfolio-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0,0,0,0.8);
      display: none;
      justify-content: center;
      align-items: center;
      z-index: 1060;
    }
    
    .portfolio-modal {
      position: relative;
      max-width: 90%;
      max-height: 90%;
    }
    
    .portfolio-modal img {
      max-width: 100%;
      max-height: 80vh;
      border-radius: 10px;
    }
    
    .close-portfolio {
      position: absolute;
      top: -15px;
      right: -15px;
      width: 40px;
      height: 40px;
      background-color: white;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      cursor: pointer;
      box-shadow: 0 2px 5px rgba(0,0,0,0.2);
    }
    
    .close-portfolio i {
      font-size: 1.5rem;
      color: #332318;
    }
  </style>
</head>
<body>

  <div class="container mt-2 mb-3">
    <h1 class="text-center mb-4 mt-3">VERIFIED AS ADMIN</h1>
  </div>

  {{-- Daftar Artist --}}
  <main class="container">
    @foreach ($artistsItem as $artist)
    <div class="user-card" data-bs-toggle="modal" data-bs-target="#userModal"
         data-name="{{ $artist->name }}"
         data-location="{{ $artist->address->alamat }}"
         data-phone="{{ $artist->phone }}"
         data-email="{{ $artist->email }}"
         data-status="{{ $artist->status }}"
         data-portfolio="{{ $artist->file_certificate }}">
      <div class="d-flex justify-content-between align-items-center">
        <div>
          <span class="fw-bold">{{ $artist->name }}</span>
          {{-- @if ($artist->profile_photo)
            <img src="{{ asset($artist->profile_photo) }}" alt="Profile Photo" class="user-avatar">
          @else
            <img src="{{ asset('image/Profile-Foto.jpg') }}" alt="Default Profile Photo" class="user-avatar">
          @endif --}}

          @if ($artist->status == 'accepted')
          <span class="verified-badge"><i class="bi bi-patch-check-fill"></i> Verified</span>
          @else
          <span class="verified-badge"><i class="bi bi-patch-exclamation-fill"></i> Not Verified</span>
          @endif
          <div class="text-muted">{{ $artist->address->alamat }}</div>
        </div>
        @if ($artist->status == 'accepted')
          <span class="badge bg-success">Verified</span>
        @elseif ($artist->status == 'pending')
          <span class="badge bg-secondary">Pending</span>
        @else
          <span class="badge bg-danger">Rejected</span>
        @endif
        <i class="bi bi-chevron-right"></i>
      </div>
    </div>
    @endforeach
  </main>

  <!-- Pop Up Detail Artist -->
  <div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-center">
          <img src="{{ asset($artistItem->profile_photo ?? 'image/Profile-Foto.jpg') }}" class="user-avatar" id="modalUserAvatar">
          <h5 class="mb-1" id="modalUserName">Nama</h5><i class="bi bi-patch-check-fill"></i>
          <p class="text-muted mb-3" id="modalUserLocation">Alamat</p>
          <div class="d-flex justify-content-center gap-3 mb-4">
            <div>
              <div class="fw-bold">Phone</div>
              <div class="text-muted small" id="modalUserPhone">-</div>
            </div>
            <div>
              <div class="fw-bold">Email</div>
              <div class="text-muted small" id="modalUserEmail">-</div>
            </div>
            <div>
              <div class="fw-bold">Status</div>
              <div class="text-muted small" id="modalUserStatus">-</div>
            </div>
            <div>
              <div class="fw-bold">Portofolio</div>
              <div class="text-muted small portfolio-icon" id="showPortfolioBtn"><i class="bi bi-folder2-open"></i></div>
            </div>
          
            <!-- Portfolio Overlay (tambahkan sebelum </body>) -->
            <div class="portfolio-overlay" id="portfolioOverlay">
              <div class="portfolio-modal">
                <span class="close-portfolio" id="closePortfolio">
                  <i class="bi bi-x-lg"></i>
                </span>
                <img id="portfolioImage" src="" alt="Portfolio">
              </div>
            </div>          
          </div>

          {{-- Tombol Aksi --}}
            @if ($artist->status == 'pending')
            <form method="POST" action="{{ route('admin.post.update-status', $artist->id) }}">
              @csrf
              <button type="submit" name="status" value="accepted">Terima</button>
              <button type="submit" name="status" value="rejected">Tolak</button>
            </form>
            @endif
        </div>
      </div>
    </div>
  </div>

  <!-- Navbar Bottom -->
  <nav class="navbar fixed-bottom navbar-expand-sm" style="background-color: #332318; width: 340px; border-radius: 50px; margin-left: 40%; margin-bottom: 20px; padding: 5px 0;">
    <div class="container-fluid">
      <div class="collapse navbar-collapse justify-content-md-center">
        <ul class="navbar-nav nav-brand" style="gap: 60px;">
          <li class="nav-item">
            <a class="nav-link fs-4 active" href="#"><i class="bi bi-person-fill-check"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-4" href="#"><i class="bi bi-pie-chart-fill"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link fs-4" href="#"><i class="bi bi-gear-fill"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  {{-- Script Pop Up Detail Artist & Portfolio --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // User modal functionality
        var userModal = document.getElementById('userModal');
        userModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            document.getElementById('modalUserName').textContent = button.getAttribute('data-name');
            document.getElementById('modalUserLocation').textContent = button.getAttribute('data-location');
            document.getElementById('modalUserPhone').textContent = button.getAttribute('data-phone');
            document.getElementById('modalUserEmail').textContent = button.getAttribute('data-email');
            document.getElementById('modalUserStatus').textContent = button.getAttribute('data-status');
            const portfolio = button.getAttribute('data-portfolio');
            
            // Reset portfolio preview when modal opens
            const portfolioPreview = document.getElementById('portfolioPreview');
            if (portfolioPreview) {
                portfolioPreview.style.display = 'none';
                const showPortfolioBtn = document.getElementById('showPortfolioBtn');
                if (showPortfolioBtn) {
                    showPortfolioBtn.innerHTML = '<i class="bi bi-folder2-open"></i>';
                }
            }
        });

        // Portfolio functionality
        const showPortfolioBtn = document.getElementById('showPortfolioBtn');
        const portfolioOverlay = document.getElementById('portfolioOverlay');
        const portfolioImage = document.getElementById('portfolioImage');
        const closePortfolio = document.getElementById('closePortfolio');

        if (showPortfolioBtn && portfolioOverlay) {
            // Data portfolio - bisa diambil dari data attribute jika dinamis
            const portfolioImageUrl = "{{ Storage::url($artist->file_certificate) }}";
            

        showPortfolioBtn.addEventListener('click', function() {
          portfolioImage.src = portfolioImageUrl;
          portfolioOverlay.style.display = 'flex';
        });

        closePortfolio.addEventListener('click', function() {
          portfolioOverlay.style.display = 'none';
        });

        // Tutup ketika klik di area overlay
        portfolioOverlay.addEventListener('click', function(e) {
          if (e.target === portfolioOverlay) {
            portfolioOverlay.style.display = 'none';
          }
        });
        }
    });
</script>
</body>
</html>

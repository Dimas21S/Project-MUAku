<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin ~ Verified</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Red+Hat+Display:wght@400;700&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css" rel="stylesheet">

  <style>
    :root {
      --primary: #847D9C;
      --secondary: #8FAAF8;
      --danger: #AA2424;
      --text-dark: #322E2E;
      --text-light: #F2EDE9;
      --brand: #916D58;
    }

    body {
      background: linear-gradient(#DFDBDC, #E6DBD9, #E4CFCE, #D3CEE5);
      min-height: 100vh;
      background-size: cover;
      background-position: center 48%;
    }

    .user-card {
      width: 100%;
      height: 70px;
      background-color: #F2E6E8;
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

    /* Header Styles */
    .navbar {
      background: #FFFFFF;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
      padding: 0.75rem 2rem;
    }
    
    .brand {
      font-family: 'DM Serif Display', serif;
      color: var(--brand);
      font-size: 1.6rem;
      display: flex;
      align-items: center;
      gap: 0.75rem;
      text-decoration: none;
    }
    
    .brand-logo {
      width: 50px;
      height: auto;
    }
    
    .nav-link {
      font-family: 'Inter', sans-serif;
      font-size: 1.1rem;
      color: var(--text-dark);
      padding: 0.5rem 1rem;
      transition: all 0.3s ease;
    }
    
    .nav-link.active {
      font-weight: 500;
      text-decoration: underline;
    }
    
    .logout-link {
      font-weight: 700;
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

    .icon-container {
      width: 80px;
      height: 80px;
      background-color: #e63946;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .exclamation-icon {
      color: white;
      font-size: 40px;
      font-weight: bold;
    }

     @media (max-width: 767.98px) {
    .user-card {
      padding: 1rem;
    }
    .artist-avatar {
      width: 40px;
      height: 40px;
    }
   }

    @media (max-width: 575.98px) {
      .user-card {
        border-radius: 10px;
      }
    }
  </style>
</head>
<body>
  <x-navbar/>

  {{-- Artist List --}}
  <main class="container mt-3">
    @if($verifications->isEmpty())
      <div class="alert alert-info text-center">
        <i class="bi bi-info-circle-fill"></i> Tidak ada artist yang ditemukan
      </div>
    @else
      @foreach ($verifications as $verification)
      <div class="user-card d-flex align-items-center" 
          data-bs-toggle="modal" 
          data-bs-target="#userModal"
          data-route="{{ route('admin.post.update-status', $verification->id) }}"
          data-id="{{ $verification->id }}"
          data-name="{{ $verification->username }}"
          data-location="{{ $verification->makeUpArtist->address->kota ?? 'Jambi' }}"
          data-phone="{{ $verification->phone }}"
          data-email="{{ $verification->email }}"
          data-status="{{ $verification->status }}"
          data-category="{{ $verification->category }}"
          data-portfolio-url="{{ Storage::url($verification->file_certificate) }}"
          data-description="{{ $verification->description }}">
        
        <div class="d-flex align-items-center flex-grow-1">
          <img src="{{ asset('image/MUAku-Icon.png') }}" 
              class="artist-avatar me-3"
              alt="{{ $verification->username }}"
              width="40" 
              height="40">
          
          <div class="artist-info">
            <div class="d-flex align-items-center">
              <h6 class="fw-bold mb-0 me-2">{{ $verification->username }}</h6>
              @if ($verification->status == 'accepted')
                <span class="verified-badge">
                  <i class="bi bi-patch-check-fill"></i> Verified
                </span>
              @else
                <span class="text-warning">
                  <i class="bi bi-patch-exclamation-fill"></i> Not Verified
                </span>
              @endif
            </div>
            <small class="text-muted">{{ $verification->category }}</small>
          </div>
        </div>
        
        <div class="d-flex align-items-center">
          @if ($verification->status == 'accepted')
            <span class="badge rounded-pill bg-success me-2">Verified</span>
          @elseif ($verification->status == 'pending')
            <span class="badge rounded-pill bg-warning text-dark me-2">Pending</span>
          @else
            <span class="badge rounded-pill bg-danger me-2">Rejected</span>
          @endif
          <i class="bi bi-chevron-right text-muted"></i>
        </div>
      </div>
      @endforeach
    @endif
  </main>

<!-- Pop Up Detail Artist -->
<div class="modal fade" id="userModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <h1 class="fw-bold text-center">Request</h1>
      <div class="modal-body">
        <div class="row">
          <!-- Left Column - Basic Info -->
          <div class="col-md-6 pe-4 border-end">
            <div class="d-flex flex-column mb-4">
              <div class="mb-3">
                <div class="fw-bold text-muted small">Username</div>
                <div class="p-2 bg-light rounded text-start" id="modalUserName">Nama Artist</div>
              </div>

              <div class="mb-3">
                <div class="fw-bold text-muted small">Address</div>
                <div class="p-2 bg-light rounded text-start" id="modalUserLocation"></div>
              </div>

              <div class="mb-3">
                <div class="fw-bold text-muted small">Status</div>
                <div class="p-2 bg-light rounded text-start" id="modalUserStatus">Aktif/Tersedia</div>
              </div>

              <div class="mb-3">
                <div class="fw-bold text-muted small">Email</div>
                <div class="p-2 bg-light rounded text-start" id="modalUserEmail">artist@example.com</div>
              </div>
            </div>
          </div>

          <!-- Right Column - Contact Info -->
          <div class="col-md-6 ps-4">
            <div class="mb-4">
              <h6 class="fw-bold">Informasi Kontak</h6>
              
              <div class="row mb-3">
                <div class="col-12">
                  <div class="fw-bold text-muted small">Telepon</div>
                  <div class="p-2 bg-light rounded" id="modalUserPhone">0812-3456-7890</div>
                </div>
              </div>
              
              <div class="row mb-3">
                <div class="col-12">
                  <div class="fw-bold text-muted small">Category</div>
                  <div class="p-2 bg-light rounded fw-bold" id="modalUserCategory">Category</div>
                </div>
              </div>
                                
              <div class="mb-3">
                <div class="fw-bold text-muted small">Deskripsi</div>
                <div class="p-2 bg-light rounded" id="modalUserDeskripsi" style="min-height: 100px;">
                  Deskripsi artist akan muncul di sini...
                </div>
              </div>

              <div class="d-grid gap-2 mb-4">
                <button class="btn btn-outline-primary btn-sm" id="showPortfolioBtn">
                  <i class="bi bi-folder2-open"></i> Lihat Portofolio
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Action Buttons -->
      <div class="modal-footer border-0">
        <form method="POST" action="" id="statusForm" class="w-100 d-none">
          @csrf
          <div class="d-flex justify-content-center gap-3">
            <button type="submit" name="status" value="accepted" class="btn btn-success px-4">
              <i class="bi bi-check-circle"></i> Terima
            </button>
            <button type="submit" name="status" value="rejected" class="btn btn-danger px-4">
              <i class="bi bi-x-circle"></i> Tolak
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  
  <!-- Portfolio Overlay -->
  <div class="portfolio-overlay" id="portfolioOverlay">
    <div class="portfolio-modal">
      <span class="close-portfolio" id="closePortfolio">
        <i class="bi bi-x-lg"></i>
      </span>
      <img id="portfolioImage" src="" alt="Portfolio">
    </div>
  </div>

  <!-- Modal Logout -->
  <x-modal-logout/>
  <x-pagination :paginator="$verifications" />

  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // User modal functionality
      var userModal = document.getElementById('userModal');
      let currentPortfolioUrl = '';
      let currentUserId = '';

      userModal.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        currentUserId = button.getAttribute('data-id');
        const userStatus = button.getAttribute('data-status');
        
        document.getElementById('modalUserName').textContent = button.getAttribute('data-name');
        document.getElementById('modalUserLocation').textContent = button.getAttribute('data-location');
        document.getElementById('modalUserPhone').textContent = button.getAttribute('data-phone');
        document.getElementById('modalUserEmail').textContent = button.getAttribute('data-email');
        document.getElementById('modalUserStatus').textContent = userStatus;
        document.getElementById('modalUserCategory').textContent = button.getAttribute('data-category');
        document.getElementById('modalUserDeskripsi').textContent = button.getAttribute('data-description');
        currentPortfolioUrl = button.getAttribute('data-portfolio-url');

        // Update form action and show/hide buttons based on status
        const statusForm = document.getElementById('statusForm');
        const dynamicRoute = button.getAttribute('data-route');

        if (dynamicRoute) {
          statusForm.action = dynamicRoute;
        } else {
          statusForm.action = `/update-status/${currentUserId}`;
        }
        
        if (userStatus === 'pending') {
          statusForm.classList.remove('d-none');
        } else {
          statusForm.classList.add('d-none');
        }
      });

      // Portfolio functionality
      const showPortfolioBtn = document.getElementById('showPortfolioBtn');
      const portfolioOverlay = document.getElementById('portfolioOverlay');
      const portfolioImage = document.getElementById('portfolioImage');
      const closePortfolio = document.getElementById('closePortfolio');

      if (showPortfolioBtn && portfolioOverlay) {
        showPortfolioBtn.addEventListener('click', function() {
          if (currentPortfolioUrl) {
            portfolioImage.src = currentPortfolioUrl;
            portfolioOverlay.style.display = 'flex';
          } else {
            alert('Portfolio tidak tersedia');
          }
        });

        closePortfolio.addEventListener('click', function() {
          portfolioOverlay.style.display = 'none';
        });

        // Close when clicking on overlay area
        portfolioOverlay.addEventListener('click', function(e) {
          if (e.target === portfolioOverlay) {
            portfolioOverlay.style.display = 'none';
          }
        });
      }
    });

    function confirmLogout(event) {
      event.preventDefault();
      if (confirm('Apakah Anda yakin ingin logout?')) {
        document.getElementById('logout-form').submit();
      }
    }
  </script>
</body>
</html>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin ~ Verrified</title>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&family=Red+Hat+Display:wght@400;700&display=swap" rel="stylesheet">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">


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

    .exclamation-icon {
        color: white;
        font-size: 40px;
        font-weight: bold;
    }
  </style>
</head>
<body>
      <x-navbar/>

      {{-- Daftar Artist --}}
      <main class="container mt-3">
        @foreach ($artistsItem as $artist)
        <div class="user-card" data-bs-toggle="modal" data-bs-target="#userModal"
            data-name="{{ $artist->username }}"
            data-location="{{ $artist->address->kota ?? 'Jambi'}}"
            data-phone="{{ $artist->phone }}"
            data-email="{{ $artist->email }}"
            data-status="{{ $artist->status }}"
            data-category="{{ $artist->category }}"
            data-portfolio-url="{{ Storage::url($artist->file_certificate) }}"
            data-description="{{ $artist->description }}">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <img src="{{ asset('image/MUAku-Icon.png') }}" style="object-fit: cover; width: 40px; height: auto; margin-right: 10px; vertical-align: middle;" \>
              <span class="fw-bold">{{ $artist->username }}</span>
              @if ($artist->status == 'accepted')
              <span class="verified-badge"><i class="bi bi-patch-check-fill"></i> Verified</span>
              @else
              <span class="verified-badge"><i class="bi bi-patch-exclamation-fill"></i> Not Verified</span>
              @endif
              <div class="text-muted ms-5">{{ $artist->category }}</div>
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
                    <div class="text-center mb-4">
                      
                      <div class="col-6 mb-3">
                        <div class="fw-bold text-muted small">Username</div>
                        <div class="p-2 bg-light rounded" id="modalUserName">Nama Artist</div>
                      </div>
                      
                      <div class="col-6 mb-3">
                        <div class="fw-bold text-muted small">Address</div>
                        <div class="p-2 bg-light rounded" id="modalUserLocation">
                        </div>
                      </div>

                      <div class="col-6 mb-3">
                        <div class="fw-bold text-muted small">Status</div>
                        <div class="p-2 bg-light rounded" id="modalUserStatus">Aktif/Tersedia</div>
                      </div>

                      <div class="col-6">
                        <div class="fw-bold text-muted small">Email</div>
                        <div class="p-2 bg-light rounded" id="modalUserEmail">artist@example.com</div>
                      </div>
                      
                    </div>
                  </div>

                  <!-- Right Column - Contact Info -->
                  <div class="col-md-6 ps-4">
                    <div class="mb-4">
                      <h6 class="fw-bold">Informasi Kontak</h6>
                      
                      <div class="row mb-3">
                        <div class="col-6">
                          <div class="fw-bold text-muted small">Telepon</div>
                          <div class="p-2 bg-light rounded" id="modalUserPhone">0812-3456-7890</div>
                        </div>
                      </div>
                      
                      <div class="row mb-3">
                        <div class="col-6">
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
                                <!-- Action Buttons -->
                        <div class="modal-footer border-0">
                          @if ($artist->status == 'pending')
                          <form method="POST" action="{{ route('admin.post.update-status', $artist->id) }}" class="w-100">
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
                          @endif
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              </div>
            </div>
          </div>
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
        </div>
      </div>
    </div>
            <!-- Modal Logout -->
      <x-modal-logout/>
      <x-pagination :paginator="$artistsItem" />
  </div>
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  {{-- Script Pop Up Detail Artist & Portfolio --}}
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // User modal functionality
        var userModal = document.getElementById('userModal');
        let currentPortfolioUrl = '';

        userModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            document.getElementById('modalUserName').textContent = button.getAttribute('data-name');
            document.getElementById('modalUserLocation').textContent = button.getAttribute('data-location');
            document.getElementById('modalUserPhone').textContent = button.getAttribute('data-phone');
            document.getElementById('modalUserEmail').textContent = button.getAttribute('data-email');
            document.getElementById('modalUserStatus').textContent = button.getAttribute('data-status');
            document.getElementById('modalUserCategory').textContent = button.getAttribute('data-category');
            document.getElementById('modalUserDeskripsi').textContent = button.getAttribute('data-description');
            currentPortfolioUrl = button.getAttribute('data-portfolio-url');
            
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
          portfolioImage.src = currentPortfolioUrl;
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

        function confirmLogout(event) {
        event.preventDefault();
        if (confirm('Apakah Anda yakin ingin logout?')) {
            document.getElementById('logout-form').submit();
        }
    }
</script>
</body>
</html>

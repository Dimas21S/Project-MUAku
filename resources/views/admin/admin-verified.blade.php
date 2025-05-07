<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">
    <title>Data Pengguna Berlangganan</title>
    <style>
        body {
            min-height: 100vh;
            background-image: url('{{ asset('image/foto-makeup.jpg') }}');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center 48%;
            font-family: 'DM Serif Display', sans-serif;
        }
        
        .user-card {
            width: 100%; 
            height: 70px; 
            background-color: white; 
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
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
        
        .modal-header {
            border-bottom: none;
            padding-bottom: 0;
        }
        
        .user-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            display: block;
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
    <div class="container mt-2 mb-3">
      <h1 class="text-center mb-4 mt-3">VERIFIED AS ADMIN</h1>
    </div>

    <main class="container">
        <!-- User Card 1 -->
        <div class="user-card" data-bs-toggle="modal" data-bs-target="#userModal" data-name="BeautyBySarah" data-location="Jakarta">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="fw-bold">BeautyBySarah</span>
                    <span class="verified-badge"><i class="bi bi-patch-check-fill"></i> Verified</span>
                    <div class="text-muted">Jakarta</div>
                </div>
                <i class="bi bi-chevron-right"></i>
            </div>
        </div>
        
        <!-- User Card 2 -->
        <div class="user-card" data-bs-toggle="modal" data-bs-target="#userModal" data-name="GlamourStudio" data-location="Bandung">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="fw-bold">GlamourStudio</span>
                    <span class="verified-badge"><i class="bi bi-patch-check-fill"></i> Verified</span>
                    <div class="text-muted">Bandung</div>
                </div>
                <i class="bi bi-chevron-right"></i>
            </div>
        </div>
        
        <!-- User Card 3 -->
        <div class="user-card" data-bs-toggle="modal" data-bs-target="#userModal" data-name="MakeupByDian" data-location="Surabaya">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="fw-bold">MakeupByDian</span>
                    <span class="verified-badge"><i class="bi bi-patch-check-fill"></i> Verified</span>
                    <div class="text-muted">Surabaya</div>
                </div>
                <i class="bi bi-chevron-right"></i>
            </div>
        </div>
    </main>
    
    <!-- User Detail Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body text-center">
            <img src="{{ asset('image/foto-cewek-1.jpg') }}" class="user-avatar" id="modalUserAvatar">
            <h5 class="mb-1" id="modalUserName">BeautyBySarah</h5>
            <p class="text-muted mb-3" id="modalUserLocation">Jakarta</p>
            
            <div class="d-flex justify-content-center gap-3 mb-4">
                <div>
                    <div class="fw-bold">125</div>
                    <div class="text-muted small">Clients</div>
                </div>
                <div>
                    <div class="fw-bold">4.9</div>
                    <div class="text-muted small">Rating</div>
                </div>
                <div>
                    <div class="fw-bold">3</div>
                    <div class="text-muted small">Years</div>
                </div>
            </div>
            
            <div class="d-grid gap-2">
                <button class="btn btn-outline-danger" type="button">
                    <i class="bi bi-trash"></i> Remove Account
                </button>
                <button class="btn btn-primary" type="button">
                    <i class="bi bi-chat-left-text"></i> Send Message
                </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar fixed-bottom navbar-expand-sm" style="background-color: #332318; width: 340px; border-radius: 50px; margin-left: 40%; margin-bottom: 20px; padding: 5px 0;">
      <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
          <ul class="navbar-nav nav-brand" style="gap: 60px;">
            <li class="nav-item">
              <a class="nav-link fs-4" href="#"><i class="bi bi-person-fill-check"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4" aria-disabled="true"><i class="bi bi-pie-chart-fill"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4" href="#" aria-expanded="false"><i class="bi bi-gear-fill"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script>
        // Update modal content based on which user card was clicked
        document.addEventListener('DOMContentLoaded', function() {
            var userModal = document.getElementById('userModal');
            
            userModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var userName = button.getAttribute('data-name');
                var userLocation = button.getAttribute('data-location');
                
                document.getElementById('modalUserName').textContent = userName;
                document.getElementById('modalUserLocation').textContent = userLocation;
                
                // Generate random avatar based on name for demo purposes
                var randomId = Math.floor(Math.random() * 100);
                var gender = userName.length % 2 === 0 ? 'women' : 'men';
                document.getElementById('modalUserAvatar').src = null;
            });
        });
    </script>
  </body>
</html>
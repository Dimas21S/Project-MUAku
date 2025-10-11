<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Profil Make Up Artist ~ {{ $artist->name ?? 'Artist' }}</title>
    <style>
        body {
            min-height: 100vh;
            background: #ffffff;
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        li {
            margin-right: 1.5rem;
        }

        .profile-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .card-body {
            min-height: 280px;
            display: flex;
            flex-direction: column;
        }
        
        .card-body button {
            margin-top: auto;
        }
        
        .content-wrapper {
            display: flex;
            gap: 2rem;
            margin-top: 1rem;
        }

        .navbar-brand {
            font-family: 'DM Serif Display', serif;
            font-weight: 100;
            font-style: normal;
            color: #A87648;
            font-size: 20px;
            margin-left: 12px;
        }
      
        .nav-link {
            font-weight: 500;
            font-family: 'Inter', sans-serif;
            font-size: 20px;
        }

        .nav-link:hover {
            color: #A87648 !important;
        }

        .right-navbar .nav-link {
            color: #000000 !important;
            font-weight: 500;
            margin: 0 15px;
            transition: color 0.3s ease;
        }
        
        .image-container {
            flex: 0 0 480px;
        }
        
        .description-container {
            flex: 1;
            padding-right: 1rem;
        }

        .modal-content {
            padding-top: 2rem;
            z-index: 1055;
            position: relative;
        }

        .modal-header {
            z-index: 9999;
        }

        .btn-close {
            z-index: 9999;
            position: relative;
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
        
        .info-box {
            background: #EEEEEE;
            border: 1px solid #000;
            border-radius: 5px;
            padding: 8px 15px;
            margin-bottom: 1rem;
            width: 100%;
            max-width: 502px;
        }
        
        .info-box h6 {
            color: #555555;
            margin: 0;
        }
        
        .schedule-item {
            margin-bottom: 5px;
            font-size: 0.9rem;
        }
        
        .description-section {
            border: 1px solid #000;
            border-radius: 5px;
            padding: 20px;
            margin: 20px 0;
        }
        
        @media (max-width: 992px) {
            .content-wrapper {
                flex-direction: column;
            }
            
            .image-container {
                flex: 1;
                width: 100%;
                text-align: center;
            }
            
            .image-container img {
                max-width: 100%;
                height: auto;
            }
            
            .info-box {
                width: 100%;
            }
        }
        
        @media (max-width: 768px) {
            .profile-actions {
                justify-content: center;
            }
            
            .description-section {
                margin: 20px 10px;
                padding: 15px;
            }
        }
    </style>
  </head>
  
  <body>

    <x-navbar />

    <div class="container-fluid py-3 px-4">
        <div class="row align-items-stretch" style="min-height: 500px;">
            <!-- Foto Profil -->
            <div class="col-md-5 text-center mb-4 mb-md-0">
                <img src="{{ $artist->profile_photo ? Storage::url($artist->profile_photo) : asset('image/Profile-Foto.jpg') }}" 
                    class="rounded img-fluid" 
                    alt="Foto MUA" 
                    style="height: 474px; width: 452px; object-fit: cover;">
            </div>

            <div class="col-md-7">
                <h5 class="fw-bold">Full Name</h5>
                <div class="info-box">
                    <h6>{{ $artist->name }}</h6>
                </div>
                
                <h5 class="fw-bold">Location</h5>
                <div class="info-box">
                    <h6>{{ $artist->address->kota ?? 'Tidak tersedia' }}, {{ $artist->address->kelurahan ?? 'Tidak tersedia' }}</h6>
                </div>
                
                <h5 class="fw-bold">Category</h5>
                <div class="info-box">
                    <h6>{{ $artist->category }}</h6>
                </div>
                
                <h5 class="fw-bold">Available Hours</h5>
                <div class="info-box">
                    @if($artist->jadwal && count($artist->jadwal) > 0)
                        @foreach($artist->jadwal as $j)
                            <div class="schedule-item">
                                {{ $j->hari }}: {{ \Carbon\Carbon::parse($j->jam_buka)->format('H:i') }} - {{ \Carbon\Carbon::parse($j->jam_tutup)->format('H:i') }}
                            </div>
                        @endforeach
                    @else
                        <div class="schedule-item text-muted">
                            Jadwal belum tersedia
                        </div>
                    @endif
                </div>                
            
                <!-- Tombol Edit dan Setting Price sejajar di kanan bawah -->
                <div class="profile-actions">
                    <button type="button" class="btn text-light" 
                        onclick="window.location.href='{{ route('edit-mua') }}'" 
                        style="background: #1E2772; width: 150px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                        Edit Profil
                    </button>
                    <button type="button" class="btn text-light" 
                            onclick="window.location.href='{{ route('setting-price') }}'" 
                            style="background: #F2C25B; width: 150px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                            Setting Price
                    </button>
                </div>
            </div>
        </div>

        <!-- Garis Pemisah -->
        <hr class="my-4" />

        <!-- Section Deskripsi -->
        <div class="description-section">
            <h4 class="fw-bold text-center" style="font-family: 'DM Serif Display', serif;">Deskripsi</h4>
            <p class="mt-3" style="text-align: justify; line-height: 1.6;">
                {{ $artist->description ?? 'Tidak ada deskripsi tersedia.' }}
            </p>
        </div>

        <hr class="my-4" />

        <!-- Galeri Foto -->
        <div class="mt-5">
            <h3 class="text-center fw-bold mb-4">Galeri Karya</h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @forelse ($artist->photos as $photo)
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0" style="cursor: pointer;" 
                            onclick="showFullscreen('{{ Storage::url($photo->image_path) }}')">
                            <img src="{{ Storage::url($photo->image_path) }}" 
                                class="card-img-top" 
                                style="height: 200px; object-fit: cover; border-radius: 10px;" 
                                alt="Karya {{ $artist->name }}">
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <div class="d-flex flex-column align-items-center">
                            <i class="bi bi-images fs-1 text-muted mb-3"></i>
                            <h5 class="text-muted">Belum ada karya yang ditampilkan</h5>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Modal Fullscreen -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content bg-transparent border-0">
                    <div class="modal-header border-0 position-absolute top-0 end-0 z-1">
                        <button type="button" class="btn-close btn-close-white bg-dark rounded-circle p-2" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center p-0 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                        <img id="fullscreenImage" src="" class="img-fluid" style="max-height: 90vh; max-width: 100%; object-fit: contain;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="customLogoutModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center p-4 custom-modal">
                <h4 class="fw-bold mb-3">Logout</h4>
                <div class="mb-3">
                    <div class="icon-container mx-auto">
                        <span class="exclamation-icon">!</span>
                    </div>
                </div>
                <p class="mb-4">Are you sure you want to logout?</p>
                <div class="d-flex justify-content-center gap-3">
                    <!-- Form Logout -->
                    <form method="POST" action="{{ route('log-out') }}">
                        @csrf
                        <button type="submit" class="btn btn-success px-4">Yes</button>
                    </form>
                    <button class="btn btn-danger px-4" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function showFullscreen(imageSrc) {
            const fullscreenImage = document.getElementById('fullscreenImage');
            fullscreenImage.src = imageSrc;
            
            const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));
            imageModal.show();
        }
        
        function confirmLogout(event) {
            event.preventDefault();
            
            const logoutModal = new bootstrap.Modal(document.getElementById('customLogoutModal'));
            logoutModal.show();
            
            return false;
        }
    </script>
  </body>
</html>
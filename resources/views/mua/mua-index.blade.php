{{-- <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Profil Make Up Artist {{ $artist->name ?? 'Artist'}} }}">

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display&display=swap" rel="stylesheet">

    <title>{{ $artist->name ?? 'Artist' }} - Profil Make Up Artist</title>

    <style>
        :root {
            --primary-color: #EECFC0;
            --secondary-color: #A87648;
            --dark-color: #332318;
            --light-color: #F6F6F6;
        }
        
        body {
            min-height: 100vh;
            background: linear-gradient(var(--primary-color), var(--light-color));
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-color);
        }
        
        .content-wrapper {
            display: flex;
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .image-container {
            flex: 0 0 50%;
            position: relative;
        }
        
        .main-image {
            width: 100%;
            height: auto;
            max-height: 640px;
            object-fit: cover;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .thumbnail-container {
            display: flex;
            gap: 0.75rem;
            margin-top: 1rem;
            overflow-x: auto;
            padding-bottom: 0.5rem;
        }
        
        .thumbnail-btn {
            width: 80px;
            height: 80px;
            border-radius: 8px;
            padding: 0;
            border: 1px solid #ddd;
            overflow: hidden;
            flex-shrink: 0;
            transition: all 0.2s ease;
        }
        
        .thumbnail-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .thumbnail-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .description-container {
            flex: 1;
            padding: 0 1rem;
        }
        
        .artist-category {
            color: var(--secondary-color);
            font-weight: 600;
            margin-bottom: 1rem;
        }
        
        .artist-name {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: var(--dark-color);
        }
        
        .artist-info {
            margin-bottom: 1.5rem;
        }
        
        .info-item {
            margin-bottom: 0.75rem;
            display: flex;
            align-items: flex-start;
        }
        
        .info-item i {
            margin-right: 0.75rem;
            color: var(--secondary-color);
            margin-top: 0.2rem;
        }
        
        .section-title {
            font-family: 'DM Serif Display', serif;
            font-size: 1.5rem;
            font-weight: 400;
            margin: 2rem 0 1rem;
            color: var(--dark-color);
        }
        
        .action-buttons {
            display: flex;
            gap: 0.75rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }
        
        .action-btn {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid var(--dark-color);
            background-color: white;
            color: var(--dark-color);
            transition: all 0.2s ease;
        }
        
        .action-btn:hover {
            background-color: var(--dark-color);
            color: white;
        }
        
        .action-btn i {
            font-size: 1.2rem;
        }
        
        @media (max-width: 992px) {
            .content-wrapper {
                flex-direction: column;
            }
            
            .image-container {
                flex: 1;
                width: 100%;
            }
            
            .main-image {
                max-height: 500px;
            }
            
            .thumbnail-container {
                justify-content: center;
            }
        }
        
        @media (max-width: 576px) {
            .artist-name {
                font-size: 1.5rem;
            }
            
            .thumbnail-btn {
                width: 70px;
                height: 70px;
            }
        }
    </style>
  </head>
  <body>
    <div class="container py-4">
        <div class="content-wrapper">
            <div class="image-container">
                <img src="{{ $artist->profile_photo ? asset('storage/'.$artist->profile_photo) : asset('image/foto-cewek-1.jpg') }}" 
                     class="main-image" 
                     alt="Profil {{ $artist->name }}">
                
                     {{-- Daftar --}}
                {{-- <div class="thumbnail-container">
                    <button type="button" class="thumbnail-btn">
                        <img src="{{ asset('image/foto-cewek-1.jpg') }}" alt="Preview" class="thumbnail-img">
                    </button>
                    <button type="button" class="thumbnail-btn" style="background-color: var(--secondary-color);">
                        <i class="bi bi-image text-white fs-4"></i>
                    </button>
                    <button type="button" class="thumbnail-btn" style="background-color: var(--secondary-color);">
                        <i class="bi bi-image text-white fs-4"></i>
                    </button>
                    <button type="button" class="thumbnail-btn" style="background-color: var(--secondary-color);">
                        <i class="bi bi-image text-white fs-4"></i>
                    </button>
                    <button type="button" class="thumbnail-btn" style="background-color: var(--secondary-color);">
                        <i class="bi bi-arrow-right-short text-white fs-4"></i>
                    </button>
                </div>
            </div>

            <div class="description-container">
                <span class="artist-category">Kategori: {{ $artist->category }}</span>
                <h1 class="artist-name">{{ $artist->name }}</h1>
                
                <div class="artist-info">
                    <div class="info-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <div>
                            <strong>Alamat:</strong><br>
                            {{ $artist->address->alamat }}
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class="bi bi-telephone-fill"></i>
                        <div>
                            <strong>Telepon:</strong><br>
                            {{ $artist->phone }}
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <i class="bi bi-envelope-fill"></i>
                        <div>
                            <strong>Email/Sosial Media:</strong><br>
                            {{ $artist->email }}
                        </div>
                    </div>
                </div>
                
                <h2 class="section-title">Deskripsi</h2>
                <p class="artist-description">{{ $artist->description }}</p>
                
                <div class="action-buttons">
                    <button type="button" class="action-btn" title="Edit Profil" onClick="window.location.href='{{ route('edit-mua') }}'">
                        <i class="bi bi-pencil-fill"></i>
                    </button>
                    <form action="{{ route('log-out') }}" method="POST">
                        @csrf
                        <button type="submit" class="action-btn" title="Logout">
                            <i class="bi bi-box-arrow-right"></i>
                        </button>
                    </form>
                    <button type="button" class="action-btn" title="Tambah Foto">
                        <i class="bi bi-camera-fill"></i>
                    </button>
                    <a href="{{ $artist->link_map }}" class="action-btn" title="Lihat Lokasi" target="_blank">
                        <i class="bi bi-geo-alt-fill"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script untuk thumbnail preview
        document.querySelectorAll('.thumbnail-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if(this.querySelector('img')) {
                    const newSrc = this.querySelector('img').src;
                    document.querySelector('.main-image').src = newSrc;
                }
            });
        });
    </script>
  </body>
</html> --}}

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
        }
        
        li {
            margin-right: 1.5rem;
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
        
        .image-container {
            flex: 0 0 480px;
        }
        
        .description-container {
            flex: 1;
            padding-right: 1rem;
        }

        .modal-content {
            padding-top: 2rem; /* Tambah ruang agar tombol close tidak mentok */
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

        icon-container {
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
        }
    </style>
  </head>
  <body>

    <x-navbar />

    <div class="container-fluid py-3 px-4">
            <div class="row">
                <!-- Foto Profil -->
                <div class="col-md-5 text-center">
                    <img src="{{ $artist->profile_photo ? Storage::url($artist->profile_photo) : asset('image/Profile-Foto.jpg') }}" 
                        class="rounded img-fluid" 
                        alt="Foto MUA" 
                        style="height: 474px; width: 452px;">
                </div>


                <div class="col-md-7">
                    <h1 class="mb-3">{{ $artist->name }}</h1>
                    <h5 class="text-muted">{{ $artist->category }}</h5>
                    <h5 class="text-muted">{{ $artist->address->kota }}, {{ $artist->address->kelurahan }}</h5>
                </div>
                <!-- Tombol Edit di kanan bawah -->
                <button type="button" class="btn text-light position-absolute" 
                    onclick="window.location.href='{{ route('edit-mua') }}'" 
                    style="background: #1E2772; width: 150px; bottom: 190px; right: 200px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    Edit Profil
                </button>
            </div>

            <!-- Garis Pemisah -->
            <hr class="my-4" />

            <!-- Section Deskripsi -->
            <div class="mt-3 border border-dark">
                <h4 class="fw-bold text-center" style="font-family: 'DM Serif Display', serif;">Deskripsi</h4>
                <p style="margin-left: 150px; margin-right: 150px; text-align: justify;">{{ $artist->description }}</p>
            </div>

            <hr class="my-4" />

            <!-- Galeri Foto -->
            <div class="mt-5">
                <h3 class="text-center fw-bold">Galeri Karya</h3>
                <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 g-4 mt-3">
                    @foreach ($artist->photos as $photo)
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0" style="cursor: pointer;" 
                                onclick="showFullscreen('{{ Storage::url($photo->image_path) }}')">
                                <img src="{{ Storage::url($photo->image_path) }}" 
                                    class="card-img-top object-fit-cover" 
                                    style="height: 200px; border-radius: 10px;" 
                                    alt="Preview">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Modal Fullscreen -->
            <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content bg-transparent border-0">
                        <div class="modal-header border-0 position-absolute top-0 end-0 z-1">
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center p-0 d-flex justify-content-center align-items-center" style="min-height: 100vh;">
                            <img id="fullscreenImage" src="" class="img-fluid" style="max-height: 90vh; max-width: 100%;">
                        </div>
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
    </script>
    <script>
    function confirmLogout(event) {
        event.preventDefault();
        if (confirm('Apakah Anda yakin ingin logout?')) {
            document.getElementById('logout-form').submit();
        }
    }
  </script>
  </body>
</html>
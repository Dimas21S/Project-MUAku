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
            min-height: 200vh;
            background: #ffffff;
            background-attachment: fixed;
        }
        
        li {
            margin-right: 1.5rem;
        }

        .profile-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: auto;
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
            <div class="row align-items-stretch" style="min-height: 500px;">
                <!-- Foto Profil -->
                <div class="col-md-5 text-center">
                    <img src="{{ $artist->profile_photo ? Storage::url($artist->profile_photo) : asset('image/Profile-Foto.jpg') }}" 
                        class="rounded img-fluid" 
                        alt="Foto MUA" 
                        style="height: 474px; width: 452px;">
                </div>


                <div class="col-md-7">
                    <h5>Full Name</h5>
                    <div class="border border-dark rounded mb-3" style="background: #EEEEEE; width: 502px; height: 40px;">
                        <h6 class="text-start ms-3 mt-2" style="color: #555555">{{ $artist->name }}</h6>
                    </div>
                    <h5>Location</h5>
                    <div class="border border-dark rounded mb-3" style="background: #EEEEEE; width: 502px; height: 40px;">
                        <h6 class="text-start ms-3 mt-2">{{ $artist->address->kota }}, {{ $artist->address->kelurahan }}</h6>
                    </div>
                    <h5>Category</h5>
                    <div class="border border-dark rounded mb-3" style="background: #EEEEEE; width: 502px; height: 40px; ">
                        <h6 class="text-start ms-3 mt-2">{{ $artist->category }}</h6>
                    </div>
                    <h5>Full Name</h5>
                    <div class="border border-dark rounded mb-3" style="background: #EEEEEE; width: 502px; height: 40px;">
                        <h6 class="text-start ms-3 mt-2">{{ $artist->name }}</h6>
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
                                style="background: #d5df1bff; width: 150px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                Setting Price
                        </button>
                    </div>
                </div>
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
                    @forelse ($artist->photos as $photo)
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0" style="cursor: pointer;" 
                                onclick="showFullscreen('{{ Storage::url($photo->image_path) }}')">
                                <img src="{{ Storage::url($photo->image_path) }}" 
                                    class="card-img-top object-fit-cover" 
                                    style="height: 200px; border-radius: 10px;" 
                                    alt="Karya {{ $artist->username }}">
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
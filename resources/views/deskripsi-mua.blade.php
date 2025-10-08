<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Deskripsi</title>
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
        
        .image-container {
            flex: 0 0 480px;
        }
        
        .description-section {
            border-top: 1px solid #D9D9D9;
            border-bottom: 1px solid #000000;
            padding: 30px 0;
        }
        
        .description-title {
            font-size: 24px;
            line-height: 36px;
            color: #000000;
        }
        
        .description-text {
            font-size: 16px;
            line-height: 24px;
            color: #9F9F9F;
            text-align: justify;
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

        .product-hours {
            font-size: 24.6885px;
            line-height: 37px;
            color: #9F9F9F;
        }

        /* Header responsive */
        .header-container {
            background-color: #E4CFCE;
            height: 70px;
            position: relative;
        }
        
        /* Profile image responsive */
        .profile-img {
            max-height: 474px;
            width: 100%;
            object-fit: cover;
        }
        
        /* Action buttons responsive */
        .profile-actions {
            margin-top: 2rem;
        }
        
        /* Info boxes responsive */
        .info-box {
            background: #EEEEEE;
            border: 1px solid #000000;
            border-radius: 0.375rem;
            height: 40px;
            display: flex;
            align-items: center;
            padding: 0 1rem;
            width: 100%;
        }
        
        /* Responsive text alignment */
        .text-responsive {
            text-align: justify;
        }
        
        /* Mobile-first responsive design */
        @media (max-width: 576px) {
            .header-container {
                height: 60px;
            }
            
            .btn-group .btn {
                width: 35px !important;
                height: 35px !important;
            }
            
            .btn-back {
                width: 35px !important;
                height: 35px !important;
            }
            
            .profile-img {
                max-height: 300px;
            }
            
            .description-section {
                padding: 15px 0;
                height: auto !important;
            }
            
            .description-text {
                margin-left: 0 !important;
                margin-right: 0 !important;
                padding: 0 1rem;
            }
            
            .product-hours {
                font-size: 18px;
                line-height: 28px;
            }
            
            .profile-actions {
                position: static !important;
                margin-top: 1.5rem;
                text-align: center;
            }
            
            .profile-actions .btn {
                width: 100% !important;
                max-width: 200px;
            }
        }
        
        @media (max-width: 768px) {
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
            
            .description-text {
                margin-left: 1rem !important;
                margin-right: 1rem !important;
            }
            
            .info-box {
                width: 100% !important;
            }
        }
        
        @media (min-width: 769px) and (max-width: 992px) {
            .profile-img {
                max-height: 400px;
            }
            
            .description-text {
                margin-left: 3rem !important;
                margin-right: 3rem !important;
            }
        }
        
        @media (min-width: 993px) {
            .profile-actions {
                position: absolute;
                bottom: 0;
                right: 0;
            }
        }
    </style>
  </head>
  <body>
    <header class="d-flex align-items-center justify-content-center position-relative header-container">
        <!-- Tombol Kembali (Kiri) -->
        <a href="{{ route('list-mua') }}"
            class="btn btn-light rounded-circle position-absolute start-0 ms-2 ms-md-3 btn-back"
            style="width: 40px; height: 40px;">
            <i class="bi bi-arrow-left"></i>
        </a>

        <!-- Grup Tombol Aksi (Kanan) -->
        <div class="btn-group position-absolute end-0 me-2 me-md-3">
            
            <!-- Like -->
            <form action="{{ route('toggle.like', $artist->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-light rounded-circle me-2 me-md-3"
                    style="width: 40px; height: 40px;">
                @if ($likedArtistIds->contains($artist->id))
                <i class="bi bi-heart-fill text-danger"></i>
                @else
                <i class="bi bi-heart"></i>
                @endif
            </button>
            </form>

            <!-- Chat -->
            <button type="button" class="btn btn-light rounded-circle"
                    style="width: 40px; height: 40px;"
                    onclick="window.location.href='{{ route('chat.user.to.mua', ['mua_id' => $artist->id]) }}'">
            <i class="bi bi-chat-left-text text-primary"></i>
            </button>

        </div>
    </header>

    <div class="container-fluid py-3 px-3 px-md-4">
        @if ($user->role == 'customer')
            <div class="row">
                <!-- Foto Profil -->
                <div class="col-12 col-md-5 text-center mb-4 mb-md-0">
                    <img src="{{ asset('image/Profile-Foto.jpg') }}" 
                         class="profile-img rounded img-fluid" 
                         alt="Foto MUA">
                </div>

                <div class="col-12 col-md-7 position-relative">
                    <h1 class="mb-3">{{ $artist->name }}</h1>
                    <h4 class="text-muted">{{ $artist->address->kota }}, {{ $artist->address->kelurahan }}</h4>
                    <h4 class="text-muted">{{ $artist->category }}</h4>
                    <p class="product-hours mt-4">
                        Available Hours <br>
                        Monday – Friday : 08:00 AM – 08:00 PM (WIB)<br>
                        Saturday & Sunday : 07:00 AM – 10:00 PM (WIB)
                    </p>

                    <div class="profile-actions me-0 me-md-5 mt-4 mt-md-5">
                        <button type="button" class="btn text-light" 
                            onclick="window.location.href='{{ route('booking.form' $artist->id) }}'" 
                            style="background: #1E2772; width: 150px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                            Book Now
                        </button>
                    </div>
                </div> 
            </div>

            <!-- Garis Pemisah -->
            <hr class="my-4" />

            <!-- Section Deskripsi -->
            <div class="mt-3 border border-dark description-section" style="height: auto; min-height: 300px;">
                <h4 class="fw-bold text-center" style="font-family: 'DM Serif Display', serif;">Deskripsi</h4>
                <p class="description-text mx-3 mx-md-5">
                    {{ $artist->description }}
                </p>
            </div>

            <hr class="my-4" />

            <!-- Galeri Foto -->
            <div class="mt-5">
                <h3 class="text-center fw-bold">Galeri Karya</h3>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-3">
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

        @else
            <div class="content-wrapper">
                <div class="row">
                    <!-- Foto Profil -->
                    <div class="col-12 col-md-5 text-center mb-4 mb-md-0">
                        <img src="{{ $artist->profile_photo ? Storage::url($artist->profile_photo) : asset('image/foto-cewek-1.jpg') }}" 
                            class="profile-img rounded img-fluid" 
                            alt="Foto MUA">
                    </div>

                    <div class="col-12 col-md-7">
                        <h5>Full Name</h5>
                        <div class="info-box mb-3">
                            <h6 class="mb-0" style="color: #555555">{{ $artist->name }}</h6>
                        </div>
                        <h5>Location</h5>
                        <div class="info-box mb-3">
                            <h6 class="mb-0">{{ $artist->address->kota }}, {{ $artist->address->kelurahan }}</h6>
                        </div>
                        <h5>Category</h5>
                        <div class="info-box mb-3">
                            <h6 class="mb-0">{{ $artist->category }}</h6>
                        </div>
                        <h5>Available Hours</h5>
                        <div class="info-box mb-3">
                            <h6 class="mb-0">Monday-Friday: 08:00-20:00, Weekend: 07:00-22:00</h6>
                        </div>                
                    
                        <!-- Tombol Edit dan Setting Price sejajar di kanan bawah -->
                        <div class="profile-actions">
                            <button type="button" class="btn text-light" 
                                onclick="window.location.href=''" 
                                style="background: #1E2772; width: 150px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Garis Pemisah -->
                <hr class="my-4" />

                <!-- Section Deskripsi -->
                <div class="mt-3 border border-dark description-section" style="height: auto; min-height: 300px;">
                    <h4 class="fw-bold text-center" style="font-family: 'DM Serif Display', serif;">Deskripsi</h4>
                    <p class="description-text mx-3 mx-md-5">
                        {{ $artist->description }}
                    </p>
                </div>

                <hr class="my-4" />

                <!-- Galeri Foto -->
                <div class="mt-5">
                    <h3 class="text-center fw-bold">Galeri Karya</h3>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-3">
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

                <!-- Modal untuk tampilan fullscreen -->
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
        @endif
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
  </body>
</html>
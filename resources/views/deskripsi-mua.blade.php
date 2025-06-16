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

                .product-hours {
            font-size: 24.6885px;
            line-height: 37px;
            color: #9F9F9F;
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
    <header class="d-flex align-items-center justify-content-center position-relative"
        style="background-color: #E4CFCE; width:100%; height: 70px;">
  
            <!-- Tombol Kembali (Kiri) -->
            <a href="{{ route('list-mua') }}"
                class="btn btn-light rounded-circle position-absolute start-0 ms-3"
                style="width: 40px; height: 40px;">
                <i class="bi bi-arrow-left"></i>
            </a>

            <!-- Grup Tombol Aksi (Kanan) -->
            <div class="btn-group position-absolute end-0 me-3">
                
                <!-- Like -->
                <form action="{{ route('toggle.like', $artist->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-light rounded-circle me-3"
                        style="width: 40px; height: 40px;">
                    @if ($likedArtistIds->contains($artist->id))
                    <i class="bi bi-heart-fill text-danger"></i>
                    @else
                    <i class="bi bi-heart"></i>
                    @endif
                </button>
                </form>

                <!-- WhatsApp -->
                <button type="button" class="btn btn-light rounded-circle me-3"
                        style="width: 40px; height: 40px;"
                        onclick="window.location.href='https://api.whatsapp.com/send?phone={{ $artist->phone }}&text=Halo%20{{ urlencode($artist->name) }},%20saya%20tertarik%20dengan%20jasa%20makeup%20Anda.'">
                <i class="bi bi-whatsapp text-success"></i>
                </button>

                <!-- Chat -->
                <button type="button" class="btn btn-light rounded-circle"
                        style="width: 40px; height: 40px;"
                        onclick="window.location.href='{{ route('chat.user.to.mua', ['mua_id' => $artist->id]) }}'">
                <i class="bi bi-chat-left-text text-primary"></i>
                </button>

            </div>
    </header>

    <div class="container-fluid py-3 px-4"> <!-- Changed to container-fluid and added px-4 -->
        @if ($user->role == 'customer')
            <div class="row">
                <!-- Foto Profil -->
                <div class="col-md-5 text-center">
                <img src="{{ asset('image/Profile-Foto.jpg') }}" class="img-fluid"
                        class="rounded img-fluid" 
                        alt="Foto MUA" 
                        style="height: 474px; width: 442px;">
                </div>

                <div class="col-md-7">
                    <h1 class="mb-3">{{ $artist->name }}</h1>
                    <h5 class="text-muted">{{ $artist->category }}</h5>
                    {{-- <p class="mb-3">
                        <strong>Alamat:</strong> {{ $artist->address->alamat }}<br>
                        <strong>Telp:</strong> {{ $artist->phone }}<br>
                        <strong>Sosial Media:</strong> {{ $artist->email }}
                    </p> --}}
                    <p class="product-hours">
                        Available Hours <br>
                        Monday – Friday : 08:00 AM – 08:00 PM (WIB)<br>
                        Saturday & Sunday : 07:00 AM – 10:00 PM (WIB)
                    </p>
                </div>
            </div>

            <!-- Garis Pemisah -->
            <hr class="my-4" />

            <!-- Section Deskripsi -->
            <div class="mt-3 border border-dark description-section" style="height: 300px;">
                <h4 class="fw-bold text-center" style="font-family: 'DM Serif Display', serif;">Deskripsi</h4>
                <p style="margin-left: 150px; margin-right: 150px; text-align: justify;">
                    {{ $artist->description }}</p>
            </div>

            <hr class="my-4" />

            <!-- Galeri Foto -->
            <div class="mt-5">
                <h3 class="text-center fw-bold">Galeri Karya</h3>
                <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4 mt-3">
                    @foreach ($artist->photos as $photo)
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0" style="cursor: pointer;" 
                                onclick="showFullscreen('{{ Storage::url($photo->image_path) }}')">
                                <img src="{{ Storage::url($photo->image_path) }}" 
                                    class="card-img-top object-fit-cover" 
                                    style="height: 300px; border-radius: 10px;" 
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

        @else
        <div class="content-wrapper">
            <div class="row">
                <!-- Foto Profil -->
                <div class="col-md-5 text-center">
                    <img src="{{ $artist->profile_photo ? Storage::url($artist->profile_photo) : asset('image/foto-cewek-1.jpg') }}" 
                        class="rounded img-fluid" 
                        alt="Foto MUA" 
                        style="height: 474px; width: 452px;">
                </div>

                <div class="col-md-7">
                    <h1 class="mb-3">{{ $artist->name }}</h1>
                    <h5 class="text-muted">{{ $artist->category }}</h5>
                    <p class="mb-3">
                        <strong>Alamat:</strong> {{ $artist->address->alamat }}<br>
                        <strong>Telp:</strong> {{ $artist->phone }}<br>
                        <strong>Sosial Media:</strong> {{ $artist->email }}
                    </p>
                </div>
            </div>

            <!-- Garis Pemisah -->
            <hr class="my-4" />

            <!-- Section Deskripsi -->
            <div class="mt-3 border border-dark">
                <h4 class="fw-bold text-center" style="font-family: 'DM Serif Display', serif;">Deskripsi</h4>
                <p style="margin-left: 150px;">{{ $artist->description }}</p>
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
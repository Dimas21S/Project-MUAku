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
            background: linear-gradient( #EECFC0, #F6F6F6);
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
    <div class="container-fluid py-3 px-4"> <!-- Changed to container-fluid and added px-4 -->
        <header class="d-flex align-items-center justify-content-center position-relative py-3">
          <!-- Tombol kembali (diposisikan absolute di kiri) -->
           <a href="{{ route('list-mua') }}"
                class="btn btn-light rounded-circle btn-outline-dark position-absolute start-0 ms-3">
                <i class="bi bi-arrow-left"></i>
            </a>
          
          {{-- Grup tombol kanan --}}
          <div class="btn-group position-absolute end-0 me-3">

            <form action="{{ route('toggle.like', $artist->id) }}" method="POST">
                @csrf
                <button type="submit" 
                        class="btn btn-light rounded-circle btn-outline-dark"
                        style="width: 40px; height: 40px;">
                    @if ($likedArtistIds->contains($artist->id))
                        <i class="bi bi-heart-fill text-danger"></i>
                    @else
                        <i class="bi bi-heart"></i>
                    @endif
                </button>
            </form>
            <button type="button" 
                    class="btn btn-light rounded-circle btn-outline-dark"
                    style="width: 40px; height: 40px;"
                    onclick="window.location.href='https://api.whatsapp.com/send?phone={{ $artist->phone }}&text=Halo%20{{ urlencode($artist->name) }},%20saya%20tertarik%20dengan%20jasa%20makeup%20Anda.'">
              <i class="bi bi-whatsapp text-success"></i>
            </button>
            <button type="button" 
                class="btn btn-light rounded-circle btn-outline-dark"
                style="width: 40px; height: 40px;"
                onclick="window.location.href='{{ route('chat.user.to.mua', ['mua_id' => $artist->id]) }}'">
                <i class="bi bi-chat-left-text text-primary"></i>
            </button>
        
          </div>
        </header>

        @if ($user->role == 'customer')
            <div class="content-wrapper">
            <div class="image-container">
                <img src="{{ $artist->profile_photo ? Storage::url($artist->profile_photo) : asset('image/foto-cewek-1.jpg') }}" 
                    class="rounded img-fluid" 
                    alt="Foto MUA" 
                    style="max-height: 640px; margin-left: 30px; margin-right: 5px;">

                @foreach ($artist->photos as $photo)
                    <div class="d-flex justify-content-center mt-3 mb-3 ms-3">
                        <div class="d-flex flex-column align-items-center">
                            <button type="button" class="btn btn-light btn-outline-dark me-2 overflow-hidden" 
                                    style="width: 79px; height: 79px; border-radius: 8px;"
                                    onclick="showFullscreen('{{ Storage::url($photo->image_path) }}')">
                                <img src="{{ Storage::url($photo->image_path) }}" alt="Preview" class="w-100 h-100 object-fit-cover">
                            </button>
                        </div>
                    </div>
                @endforeach
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

            <div class="description-container">
                <p class="mt-0 mb-3">Kategori Make up : {{ $artist->category }}</p>
                <p class="mb-3">MUA : {{ $artist->name }}</p>
                <p class="mb-3">Alamat : {{ $artist->address->alamat }}
                    <br>Telp : {{ $artist->phone }}
                    <br>Sosial Media : {{ $artist->email }}</p> 
                <h4 style="font-family: 'DM Serif Display', serif;font-weight: 400;font-style: normal; margin-bottom: 25px; margin-top: 25px;">Deskripsi</h4>
                <p>{{ $artist->description }}</p>
            </div>
        </div>
        @else
        <div class="content-wrapper">
            <div class="image-container">
                <img src="{{ $artist->profile_photo ? Storage::url($artist->profile_photo) : asset('image/foto-cewek-1.jpg') }}" 
                    class="rounded img-fluid" 
                    alt="Foto MUA" 
                    style="max-height: 640px; margin-left: 30px; margin-right: 5px;">

                @foreach ($artist->photos as $photo)
                    <div class="d-flex justify-content-center mt-3 mb-3 ms-3">
                        <div class="d-flex flex-column align-items-center">
                            <button type="button" class="btn btn-light btn-outline-dark me-2 overflow-hidden" 
                                    style="width: 79px; height: 79px; border-radius: 8px;"
                                    onclick="showFullscreen('{{ Storage::url($photo->image_path) }}')">
                                <img src="{{ Storage::url($photo->image_path) }}" alt="Preview" class="w-100 h-100 object-fit-cover">
                            </button>
                        </div>
                    </div>
                @endforeach
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

            <div class="description-container">
                <p class="mt-0 mb-3" style="filter: blur(5px);">Kategori Make up : {{ $artist->category }}</p>
                <p class="mb-3" style="filter: blur(5px);">MUA : {{ $artist->name }}</p>
                <p class="mb-3" style="filter: blur(5px);">Alamat : {{ $artist->address->alamat }}
                    <br style="filter: blur(5px);">Telp : {{ $artist->phone }}
                    <br style="filter: blur(5px);">Sosial Media : {{ $artist->email }}</p> 
                <h4 style="font-family: 'DM Serif Display', serif;font-weight: 400;font-style: normal; margin-bottom: 25px; margin-top: 25px;">Deskripsi</h4>
                <p style="filter: blur(5px);">{{ $artist->description }}</p>
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
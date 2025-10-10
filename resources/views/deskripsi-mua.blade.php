<!doctype html>
<html lang="en">
  <head>
    <!-- Meta & Bootstrap -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Deskripsi</title>
    <style>
      body {
          min-height: 100vh;
          background: #ffffff;
      }
      .header-container {
          background-color: #E4CFCE;
          height: 70px;
          position: relative;
      }
      .profile-img {
          width: 100%;
          max-height: 474px;
          object-fit: cover;
          border-radius: 12px;
      }
      .profile-actions {
          margin-top: 2rem;
      }
      .description-section {
          border: 1px solid #D9D9D9;
          border-radius: 8px;
          padding: 30px;
          background-color: #fff;
      }
      .description-title {
          font-family: 'DM Serif Display', serif;
          font-weight: 600;
          text-align: center;
          margin-bottom: 20px;
      }
      .description-text {
          color: #6e6e6e;
          text-align: justify;
          line-height: 1.8;
      }
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
      .book-btn {
          background: #1E2772;
          color: #fff;
          width: 160px;
          border-radius: 8px;
          box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      }
      @media (max-width: 768px) {
          .content-wrapper { flex-direction: column; }
          .image-container { text-align: center; margin-bottom: 20px; }
          .book-btn { width: 100%; max-width: 200px; }
      }
    </style>
  </head>
  <body>
    <header class="d-flex align-items-center justify-content-center position-relative header-container">
        <!-- Tombol Back -->
        <a href="{{ route('list-mua') }}" class="btn btn-light rounded-circle position-absolute start-0 ms-2 ms-md-3" style="width: 40px; height: 40px;">
            <i class="bi bi-arrow-left"></i>
        </a>

        <!-- Grup Tombol Aksi -->
        <div class="btn-group position-absolute end-0 me-2 me-md-3">
            <!-- Like -->
            <form action="{{ route('toggle.like', $artist->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-light rounded-circle me-2 me-md-3" style="width: 40px; height: 40px;">
                    @if ($likedArtistIds->contains($artist->id))
                    <i class="bi bi-heart-fill text-danger"></i>
                    @else
                    <i class="bi bi-heart"></i>
                    @endif
                </button>
            </form>

            <!-- Chat -->
            <button type="button" class="btn btn-light rounded-circle me-2 me-md-3"
                    style="width: 40px; height: 40px;"
                    onclick="window.location.href='{{ route('chat.user.to.mua', ['mua_id' => $artist->id]) }}'">
                <i class="bi bi-chat-left-text text-primary"></i>
            </button>

            <!-- WhatsApp -->
            <button type="button" class="btn btn-light rounded-circle"
                    style="width: 40px; height: 40px;"
                    onclick="window.open('https://wa.me/{{ $artist->whatsapp_number }}', '_blank')">
                <i class="bi bi-whatsapp text-success"></i>
            </button>
        </div>
    </header>

    <div class="container py-5">
        <div class="row align-items-start">
            <!-- Foto -->
            <div class="col-md-5 text-center mb-4">
                <img src="{{ asset('image/Profile-Foto.jpg') }}" alt="{{ $artist->name }}" class="profile-img">
            </div>

            <!-- Detail -->
            <div class="col-md-7">
                <h2 class="fw-bold">{{ $artist->name }}</h2>
                <p class="text-muted mb-1">{{ $artist->address->kota }}, {{ $artist->address->kelurahan }}</p>
                <p class="text-muted mb-3">{{ $artist->category }}</p>

                <div>
                    <h6 class="fw-bold">Available Hours</h6>
                    <p class="mb-1 text-secondary">Monday – Friday : 08:00 – 20:00 (WIB)</p>
                    <p class="text-secondary">Saturday & Sunday : 07:00 – 22:00 (WIB)</p>
                </div>

                <div class="profile-actions mt-4">
                    <button type="button" class="btn book-btn"
                        onclick="window.location.href='{{ route('booking.form', $artist->id) }}'"> 
                        Book Now
                    </button>
                </div>
            </div>
        </div>

        <hr class="my-5">

        <!-- Deskripsi -->
        <div class="description-section mt-4">
            <h4 class="description-title">Deskripsi</h4>
            <p class="description-text">{{ $artist->description }}</p>
        </div>

        <hr class="my-5">

        <!-- Galeri -->
        <div class="mt-4">
            <h3 class="text-center fw-bold mb-4">Galeri Karya</h3>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                @forelse ($artist->photos as $photo)
                    <div class="col">
                        <div class="card h-100 shadow-sm border-0" style="cursor:pointer;" onclick="showFullscreen('{{ Storage::url($photo->image_path) }}')">
                            <img src="{{ Storage::url($photo->image_path) }}" class="card-img-top" style="height:200px; object-fit:cover; border-radius:10px;">
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <i class="bi bi-images fs-1 text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada karya yang ditampilkan</h5>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content bg-transparent border-0">
                    <div class="modal-header border-0 position-absolute top-0 end-0 z-1">
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center p-0 d-flex justify-content-center align-items-center" style="min-height:100vh;">
                        <img id="fullscreenImage" src="" class="img-fluid" style="max-height:90vh; max-width:100%;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function showFullscreen(imageSrc) {
            document.getElementById('fullscreenImage').src = imageSrc;
            new bootstrap.Modal(document.getElementById('imageModal')).show();
        }
    </script>
  </body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">
    <title>List MakeUpArtist</title>
    <link rel="stylesheet" href="{{ asset('css/list-mua.css') }}">
    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    </style>
  </head>
  <body>
    {{-- Tombol pada Carousel akan mengarah ke halaman paket-berlangganan --}}
    <main>
      <div class="container-fluid px-4 mt-4">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h2 class="mb-1 fw-bold" style="color: #332318;">
              Selamat Datang, 
              <span class="text-primary" style="color: #A87648 !important;">
                {{ $user->name ?? 'Pengguna' }}
              </span>
            </h2>
            <p class="text-muted small">
              @php
                $hour = date('H');
                if ($hour < 12) {
                    echo 'Selamat pagi!';
                } elseif ($hour < 15) {
                    echo 'Selamat siang!';
                } elseif ($hour < 18) {
                    echo 'Selamat sore!';
                } else {
                    echo 'Selamat malam!';
                }
              @endphp
              <span id="welcome-message">Apa makeup favoritmu hari ini?</span>
            </p>
          </div>
        </div>
      </div>

      {{-- Carousel --}}
      <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" style="margin-top: 20px;">
          <div class="carousel-inner" style="overflow: hidden; border-radius: 50px;">
            <div class="carousel-item active" style="background-image: url('{{ asset('image/foto-cewek-1.jpg') }}'); object-fit: cover;">
              {{-- Jangan dihapus !!! --}}
              {{-- <img src="{{ asset('image/foto-cewek-1.jpg') }}" class="d-block w-auto" alt="Makeup Artist 1"> --}}
              <div class="container">
                <div class="carousel-caption text-start">
                  {{-- Caption di dalam carousel --}}
                  <h1>Kenapa Harus Berlangganan?</h1>
                  <p class="opacity-75">Akses eksklusif ke konten premium, Lebih hemat dengan diskon khusus member, dan Bebas iklan & fitur tambahan eksklusif</p>
                  <p><a class="btn btn-lg btn-primary" href="{{ route('payment') }}">Daftar sekarang</a></p>
                </div>
              </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('image/foto-cewek-2.jpg') }}'); object-fit: cover;">
              {{-- Jangan dihapus !!! --}}
              {{-- <img src="{{ asset('image/foto-cewek-2.jpg') }}" class="d-block w-100" alt="Makeup Artist 2" style="border-radius: 40px;"> --}}
              <div class="container">
                <div class="carousel-caption">
                  {{-- Caption di dalam carousel --}}
                  <h1>Lebih Untung Langganan!</h1>
                  <p>Bayar sekali, nikmati sebulan penuh! dan Gratis update fitur terbaru</p>
                  <p><a class="btn btn-lg btn-primary" href="{{ route('payment') }}">Yuk, upgrade ke paket berlangganan dan rasakan bedanya!</a></p>
                </div>
              </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('image/foto-makeup.jpg') }}'); object-fit: cover;">
              {{-- Jangan dihapus !!! --}}
              {{-- <img src="{{ asset('image/foto-makeup.jpg') }}" class="d-block w-100" alt="Makeup Products"> --}}
              <div class="container">
                <div class="carousel-caption text-end">
                  {{-- Caption di dalam carousel --}}
                  <h1>Premium Quality Products</h1>
                  <p>We use only the best cosmetics for your skin.</p>
                  <p><a class="btn btn-lg btn-primary" href="#">Our Products</a></p>
                </div>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
          <div class="carousel-indicators">
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
      </div>

      {{-- Kategori MUA --}}
      <form method="GET" action="{{ route('list-mua') }}">
        @csrf
        <div class="container mt-5 mx-1">
          <h4 class=" fw-bold" style="padding-left: 0px;">Kategori Make Up</h4>
          <div class="row gx-2 mt-3 mb-3">

              <div class="col-auto mb-3 mx-3">
                <button class="btn p-0 border-0 bg-transparent text-center" name="category" value="Pesta dan Acara">
                  <div class="d-flex flex-column align-items-center">
                    <img src="{{ asset('image/foto-cewek-2.jpg') }}" 
                        alt="Makeup Artist 1" 
                        class="rounded-circle object-fit-cover mb-2 shadow-sm" 
                        style="width: 70px; height: 70px; object-fit: cover;">
                    <span class="fw-semibold text-dark">Pesta <br>dan Acara</span>
                  </div>
                </button>
              </div>
              <div class="col-auto mb-3 mx-3">
                <button class="btn p-0 border-0 bg-transparent text-center" name="category" value="Pengantin">
                  <div class="d-flex flex-column align-items-center">
                    <img src="{{ asset('image/foto-cewek-2.jpg') }}" 
                        alt="Makeup Artist 1" 
                        class="rounded-circle object-fit-cover mb-2 shadow-sm" 
                        style="width: 70px; height: 70px; object-fit: cover;">
                    <span class="fw-semibold text-dark">Pengantin</span>
                  </div>
                </button>
              </div>
              <div class="col-auto mb-3 mx-3">
                <button class="btn p-0 border-0 bg-transparent text-center" name="category" value="Editorial">
                  <div class="d-flex flex-column align-items-center">
                    <img src="{{ asset('image/foto-cewek-2.jpg') }}" 
                        alt="Makeup Artist 1" 
                        class="rounded-circle object-fit-cover mb-2 shadow-sm" 
                        style="width: 70px; height: 70px; object-fit: cover;">
                    <span class="fw-semibold text-dark">Editorial</span>
                  </div>
                </button>
              </div>
              <div class="col-auto mb-3 mx-3">
                <button class="btn p-0 border-0 bg-transparent text-center" name="category" value="Artistik">
                  <div class="d-flex flex-column align-items-center">
                    <img src="{{ asset('image/foto-cewek-2.jpg') }}" 
                        alt="Makeup Artist 1" 
                        class="rounded-circle object-fit-cover mb-2 shadow-sm" 
                        style="width: 70px; height: 70px; object-fit: cover;">
                    <span class="fw-semibold text-dark">Artistik</span>
                  </div>
                </button>
              </div>
          </div>
        </div>
      </form>


      {{-- List MUA --}}
      <h4 class="fw-bold mb-4 ms-3">MUA Pesta dan Acara Rekomendasi</h4>
      <div class="container-fluid px-0 mt-3 mb-5">
        <div class="row mx-0 mb-3 row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-7">

          {{-- Jika role user adalah customer --}}
          @if ($user->role == 'customer')
            @foreach ($artist as $artistId)
              <!-- Card MUA -->
              <div class="col mb-4">
                <div class="card border border-dark px-1 py-1 shadow-sm h-100" style="background: transparent; position: relative;">
                  <img src="{{ asset($artistId->profile_photo ?? 'image/Profile-Foto.jpg') }}" class="card-img-top" alt="MUA 1" style="height: 200px; object-fit: cover;">
                  <div class="card-body p-2" style="background: #E0DEE7; position: relative; z-index: 2;">
                    <p class="card-text small fw-normal mb-1 text-truncate">Kategori: {{ $artistId->category }}</p>
                    <p class="card-text small fw-normal mb-1 text-truncate">Alamat:  {{ $artistId->address }}</p>
                    <a href="/deskripsi-mua/{{ $artistId->id }}" class="btn btn-outline-dark btn-sm w-100" style="position: relative; z-index: 3;">Lihat Profil</a>
                  </div>
                </div>
              </div>
            @endforeach

            {{-- Apabila role user adalah user maka tampilan card akan diblur --}}
          @elseif ($user->role == 'user')
            @foreach ($artist as $artistId)
              <div class="col mb-4">
                <div class="card border border-dark px-1 py-1 shadow-sm h-80" style="background: transparent; position: relative;">
                  <img src="{{ asset($artistId->profile_photo ?? 'image/Profile-Foto.jpg') }}" class="card-img-top" alt="MUA 1" style="height: 200px; object-fit: cover;">
                  <div class="card-body p-2" style="background: #E0DEE7; position: relative; z-index: 2;">
                    <p class="card-text small fw-normal mb-1" style="filter:blur(3px)">Kategori:  {{ $artistId->category }}</p>
                    <p class="card-text small fw-normal mb-1" style="filter:blur(3px)">Alamat:  {{ $artistId->address->alamat }}</p>
                    <a href="/deskripsi-mua/{{ $artistId->id }}" class="btn btn-outline-dark btn-sm w-100" style="position: relative; z-index: 3;">Lihat Profil</a>
                  </div>
                </div>
              </div>
            @endforeach
          @endif
        </div>
      </div>

      {{-- Component Navbar Bottom (Bisa dilihat di folder components) --}}
      {{-- Navbar Bottom --}}
      <x-navbar></x-navbar>
      
    </main>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <!-- Script untuk efek smooth carousel -->
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var myCarousel = document.querySelector('#myCarousel');
        var carousel = new bootstrap.Carousel(myCarousel, {
          interval: 5000,
          wrap: true
        });
      });

      const messages = [
          "Apa makeup favoritmu hari ini?",
          "Temukan MUA terbaik di sekitarmu!",
          "Siap tampil maksimal hari ini?",
          "Makeup bagus, mood pun ikut baik!",
          "Jangan lupa skin care sebelum makeup!"
        ];
        
        const welcomeElement = document.getElementById('welcome-message');
        let currentIndex = 0;
        
        function rotateMessage() {
          welcomeElement.style.opacity = 0;
          setTimeout(() => {
            currentIndex = (currentIndex + 1) % messages.length;
            welcomeElement.textContent = messages[currentIndex];
            welcomeElement.style.opacity = 1;
          }, 500);
        }
        
        // Change message every 5 seconds
        setInterval(rotateMessage, 5000);
      });
    </script>
  </body>
</html>
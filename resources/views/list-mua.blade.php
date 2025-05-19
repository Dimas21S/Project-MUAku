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
    <style>
      body {
          background: linear-gradient( #EECFC0, #F6F6F6);
          background-attachment: fixed;
          background-size: cover;
        }

      .carousel-item {
        height: 10vh;
        min-height: 300px;
        background: no-repeat center center scroll;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        border-radius: inherit;
      }

       .carousel-inner {
          border-radius: 50px;
          overflow: hidden;
       }

       /* Untuk Caption di Carousel */
      .carousel-caption {
        bottom: 3rem;
        z-index: 10;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 20px;
        border-radius: 10px;
      }
      
      .carousel-indicators {
        bottom: -3rem;
      }
      
      .carousel-item img {
        top: 0;
        left: 0;
        min-width: 100%;
        height: 100%;
        object-fit: cover;
      }

      .carousel .carousel-indicators button{
        width: 15px;
        height: 15px;
        border-radius: 100%;
        background-color:  #EECFC0;
      }

      .carousel .carousel-indicators button.active {
        background-color: #A87648;
      }

      .card {
        transition: all 0.3s ease;
        cursor: pointer;
        overflow: hidden;
        position: relative;
      }
    
      .card:hover {
          transform: translateY(-5px);
          box-shadow: 0 10px 20px rgba(0,0,0,0.2) !important;
      }

      .card-img-top {
          transition: transform 0.5s ease;
      }

      .card:hover .card-img-top {
          transform: scale(1.05);
      }

      .card-body {
          transition: background-color 0.3s ease;
      }

      .card:hover .card-body {
          background-color: #D5CFE1 !important;
      }

      .btn-outline-primary {
          transition: all 0.3s ease;
      }

      .card:hover .btn-outline-dark {
          background-color: #A87648;
          color: white !important;
          border-color: #A87648;
      }

      /* Efek overlay saat hover */
      .card::after {
          content: '';
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background: rgba(168, 118, 72, 0.1);
          opacity: 0;
          transition: opacity 0.3s ease;
      }

      .card:hover::after {
          opacity: 1;
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
    {{-- Tombol pada Carousel akan mengarah ke halaman paket-berlangganan --}}
    <main>
      {{-- Carousel --}}
      <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" style="margin-top: 80px;">
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
      <div class="container mt-5 mx-1">
        <h4 class=" fw-bold" style="padding-left: 0px;">Kategori Make Up</h4>
        <div class="row g-2 mt-3 mb-3">

          <div class="col-auto mb-3 mx-3">
            <button class="btn p-0 border-0 bg-transparent text-center">
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
            <button class="btn p-0 border-0 bg-transparent text-center">
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
            <button class="btn p-0 border-0 bg-transparent text-center">
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
            <button class="btn p-0 border-0 bg-transparent text-center">
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

      {{-- List MUA --}}
      <h4 class="fw-bold mb-4 ms-3">MUA Pesta dan Acara Rekomendasi</h4>
      <div class="container-fluid px-0 mt-3 mb-5">
        <div class="row mx-0 mb-3 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-7">

          {{-- Jika role user adalah customer --}}
          @if ($user->role == 'customer')
            @foreach ($artist as $artistId)
              <!-- Card MUA -->
              <div class="col mb-4">
                <div class="card border border-dark px-1 py-1 shadow-sm h-80" style="background: transparent; position: relative;">
                  <img src="{{ asset('image/foto-cewek-1.jpg') }}" class="card-img-top" alt="MUA 1" style="height: 200px; object-fit: cover;">
                  <div class="card-body p-2" style="background: #E0DEE7; position: relative; z-index: 2;">
                    <p class="card-text small fw-normal mb-1">Kategori: {{ $artistId->category }}</p>
                    <p class="card-text small fw-normal mb-1">Alamat:  {{ $artistId->address }}</p>
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
                  <img src="{{ asset('image/foto-cewek-1.jpg') }}" class="card-img-top" alt="MUA 1" style="height: 200px; object-fit: cover;">
                  <div class="card-body p-2" style="background: #E0DEE7; position: relative; z-index: 2;">
                    <p class="card-text small fw-normal mb-1" style="filter:blur(3px)">Kategori:  {{ $artistId->category }}</p>
                    <p class="card-text small fw-normal mb-1" style="filter:blur(3px)">Alamat:  {{ $artistId->address }}</p>
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
    </script>
  </body>
</html>
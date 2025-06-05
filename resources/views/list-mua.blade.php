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

      <!-- Toast Container (Tempat toast akan muncul) -->
      @if (session('user-error'))
          <x-toast :message="session('user-error')" />
      @endif

      {{-- Carousel --}}
      <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" style="margin-top: 20px;">
          <div class="carousel-inner" style="overflow: hidden; border-radius: 50px;">
            <div class="carousel-item active" style="background-image: url('{{ asset('image/foto-cewek-1.jpg') }}'); object-fit: cover;">
              {{-- Jangan dihapus !!! --}}
              {{-- <img src="{{ asset('image/foto-cewek-1.jpg') }}" class="d-block w-auto" alt="Makeup Artist 1"> --}}
              <div class="container">
                <div class="carousel-caption text-start">

                  {{-- Caption di dalam carousel --}}
                  <h4>Dapatkan Paket Berlangganan Eksklusif!</h4>
                  <p class="opacity-75">Langganan sekarang untuk akses fitur premium & diskon spesial layanan makeup.</p>
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
                  <h4>Lebih Untung Langganan!</h4>
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
                  <h4>Premium Quality Products</h4>
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

              <x-category-button
                  value="Pesta dan Acara"
                  image="image/foto-cewek-2.jpg"
                  label="Pesta<br>dan Acara" 
                  :active="request('category') ==='Pesta dan Acara'" />
              <x-category-button
                  value="Pernikahan"
                  image="image/foto-cewek-3.jpg"
                  label="Pengantin" 
                  :active="request('category') ==='Pengantin'"/>
              <x-category-button
                  value="Make Up Harian"
                  image="image/foto-cewek-4.jpg"
                  label="Editorial" 
                  :active="request('category') ==='Editorial'"/>
              <x-category-button
                  value="Make Up Natural"
                  image="image/foto-cewek-5.jpg"
                  label="Artistik" 
                  :active="request('category') ==='Artistik'"/>

          </div>
        </div>
      </form>


      {{-- List MUA --}}
      <h4 class="fw-bold mb-4 ms-3">MUA Pesta dan Acara Rekomendasi</h4>
      <div class="container-fluid px-0 mt-3 mb-5">
        <div class="row mx-0 mb-3 row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-7">

          {{-- Jika role user adalah customer --}}
          @if ($user->role == 'customer')
            @if ($artist->isEmpty())
              <div class="col-12 text-center text-muted fw-semibold fs-5">
                  Belum ada Make Up Artist yang tersedia saat ini.
              </div>
            @else
              @foreach ($artist as $artistId)
                <!-- Card MUA -->
                <x-artist-card :artist="$artistId" :blur="false" />
              @endforeach
            @endif

            {{-- Apabila role user adalah user maka tampilan card akan diblur --}}
          @elseif ($user->role == 'user')
            @if ($artist->isEmpty())
              <div class="col-12 text-center text-muted fw-semibold fs-5">
                  Belum ada Make Up Artist yang tersedia saat ini.
              </div>
            @else
              @foreach ($artist as $artistId)
                <x-artist-card :artist="$artistId" :blur="true" />
              @endforeach
            @endif
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
    <script src="{{ asset('js/carousel.js') }}"></script>

    <!-- Script untuk menampilkan toast -->
    <script src="{{ asset('js/toast.js') }}"></script>
  </body>
</html>
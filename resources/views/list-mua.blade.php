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
      /* Tambahan CSS untuk memperbaiki tampilan carousel */
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
      /* .carousel-caption {
        bottom: 3rem;
        z-index: 10;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 20px;
        border-radius: 10px;
      } */
      
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
    </style>
  </head>
  <body>
    <main>
      {{-- Carousel --}}
      <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" style="margin-top: 80px;">
          <div class="carousel-inner" style="overflow: hidden; border-radius: 50px;">
            <div class="carousel-item active" style="background-image: url('{{ asset('image/foto-cewek-1.jpg') }}');">
              {{-- Jangan dihapus !!! --}}
              {{-- <img src="{{ asset('image/foto-cewek-1.jpg') }}" class="d-block w-auto" alt="Makeup Artist 1"> --}}
              <div class="container">
                <div class="carousel-caption text-start">
                  {{-- Caption di dalam carousel --}}
                  {{-- <h1>Professional Makeup Services</h1>
                  <p class="opacity-75">Find the best makeup artists for your special occasion.</p>
                  <p><a class="btn btn-lg btn-primary" href="#">Book Now</a></p> --}}
                </div>
              </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('image/foto-cewek-2.jpg') }}');">
              {{-- Jangan dihapus !!! --}}
              {{-- <img src="{{ asset('image/foto-cewek-2.jpg') }}" class="d-block w-100" alt="Makeup Artist 2" style="border-radius: 40px;"> --}}
              <div class="container">
                <div class="carousel-caption">
                  {{-- Caption di dalam carousel --}}
                  {{-- <h1>Bridal Makeup Specialists</h1>
                  <p>Let us make you look stunning on your wedding day.</p>
                  <p><a class="btn btn-lg btn-primary" href="#">View Portfolio</a></p> --}}
                </div>
              </div>
            </div>
            <div class="carousel-item" style="background-image: url('{{ asset('image/foto-makeup.jpg') }}');">
              {{-- Jangan dihapus !!! --}}
              {{-- <img src="{{ asset('image/foto-makeup.jpg') }}" class="d-block w-100" alt="Makeup Products"> --}}
              <div class="container">
                <div class="carousel-caption text-end">
                  {{-- Caption di dalam carousel --}}
                  {{-- <h1>Premium Quality Products</h1>
                  <p>We use only the best cosmetics for your skin.</p>
                  <p><a class="btn btn-lg btn-primary" href="#">Our Products</a></p> --}}
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
                     style="width: 70px; height: 70px;">
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
                     style="width: 70px; height: 70px;">
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
                     style="width: 70px; height: 70px;">
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
                     style="width: 70px; height: 70px;">
                <span class="fw-semibold text-dark">Artistik</span>
              </div>
            </button>
          </div>
        </div>
      </div>

      {{-- List MUA --}}
      <div class="container mt-3 mb-5">
        <h4 class="fw-bold mb-4">MUA Pesta dan Acara Rekomendasi</h4>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-5">
      
          <!-- Card MUA -->
          <div class="col">
            <div class="card border border-dark px-1 py-1 shadow-sm h-80" style="background: transparent;">
              <img src="{{ asset('image/foto-cewek-1.jpg') }}" class="card-img-top" alt="MUA 1" style="height: 200px; object-fit: cover;">
              <div class="card-body p-2" style="background: #E0DEE7;">
                <p class="card-text small fw-normal mb-1">Kategori: </p>
                <p class="card-text small fw-normal mb-1">Alamat</p>
                <a href="#" class="btn btn-outline-primary btn-sm w-100">Lihat Profil</a>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card border border-dark px-1 py-1 shadow-sm h-80" style="background: transparent;">
              <img src="{{ asset('image/foto-cewek-2.jpg') }}" class="card-img-top" alt="MUA 2" style="height: 200px; object-fit: cover;">
              <div class="card-body p-2" style="background: #E0DEE7;">
                <p class="card-text small fw-normal mb-1">Kategori: </p>
                <p class="card-text small fw-normal mb-1">Alamat</p>
                <a href="#" class="btn btn-outline-primary btn-sm w-100">Lihat Profil</a>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card border border-dark px-1 py-1 shadow-sm h-100" style="background: transparent;">
              <img src="{{ asset('image/foto-cewek-2.jpg') }}" class="card-img-top" alt="MUA 2" style="height: 200px; object-fit: cover;">
              <div class="card-body p-2" style="background: #E0DEE7;">
                <p class="card-text small fw-normal mb-1">Kategori: </p>
                <p class="card-text small fw-normal mb-1">Alamat</p>
                <a href="#" class="btn btn-outline-primary btn-sm w-100">Lihat Profil</a>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card border border-dark px-1 py-1 shadow-sm h-100" style="background: transparent;">
              <img src="{{ asset('image/foto-cewek-2.jpg') }}" class="card-img-top" alt="MUA 2" style="height: 200px; object-fit: cover;">
              <div class="card-body p-2" style="background: #E0DEE7;">
                <p class="card-text small fw-normal mb-1">Kategori: </p>
                <p class="card-text small fw-normal mb-1">Alamat</p>
                <a href="#" class="btn btn-outline-primary btn-sm w-100">Lihat Profil</a>
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card border border-dark px-1 py-1 shadow-sm h-100" style="background: transparent;">
              <img src="{{ asset('image/foto-cewek-2.jpg') }}" class="card-img-top" alt="MUA 2" style="height: 200px; object-fit: cover;">
              <div class="card-body p-2" style="background: #E0DEE7;">
                <p class="card-text small fw-normal mb-1">Kategori: </p>
                <p class="card-text small fw-normal mb-1">Alamat</p>
                <a href="#" class="btn btn-outline-primary btn-sm w-100">Lihat Profil</a>
              </div>
            </div>
          </div>
      
        </div>
      </div>

      {{-- Navbar-Bottom --}}
      <nav class="navbar fixed-bottom navbar-expand-sm navbar-dark bg-dark" style="background: #E0DEE7; width: 50%; border-radius: 50px; margin-left: 25%; margin-bottom: 20px;">
        <div class="container-fluid">
          <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
            <ul class="navbar-nav">
              <li class="nav-item" style="margin-left: 10px; margin-right: 50px; padding-left: 10px;">
                <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house"></i></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Dropdown</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
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
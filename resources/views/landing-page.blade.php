<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
      body {
        background-image: url('{{ asset('image/background-landing-page.jpg') }}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        height: 90vh;
      }
      .navbar-brand {
        font-family: 'DM Serif Display', serif;
        font-weight: 400;
        font-style: normal;
        color: #A87648;
        font-size: 48px;
        margin-left: 12px; /* Added to match container padding */
      }
      
      .nav-link {
        font-weight: 500;
        margin: 0 15px;
        font-family: 'Inter', sans-serif;
        font-size: 29px;
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

      .content-wrapper {
        padding-left: 28px; /* Matches navbar brand alignment */
      }

      .collection-heading {
        font-family: 'DM Serif Display', serif;
        font-weight: 400;
        font-style: normal;
        font-size: 77px;
        line-height: 1.2;
        margin-bottom: 40px;
        white-space: nowrap; 
      }

      .new-coming {
        font-family: 'Red Hat Display', sans-serif;
        font-weight: 400;
        font-style: italic;
        font-size: 38px;
        margin-bottom: 10px;
        margin-top: 50px;
      }

      .btn-login {
        font-family: 'Red Hat Display', sans-serif;
        background-color: #A87648;
        font-color: black;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 750;
        margin-top: 40px;
      }

      .btn-login:hover {
        background-color: #A87648;
        color: white;
      }

      .btn-register {
        font-family: 'Red Hat Display', sans-serif;
        background-color: transparent;
        border: 2px solid #A87648;
        font-color: black;
        padding: 12px 30px;
        border-radius: 8px;
        font-weight: 750;
        margin-top: 40px;
      }

       .btn-register:hover {
           background-color: #A87648;
           color: white;
       }

      .image-card {
        border-radius: 10px;
        width: 169px;
        height: 125px;
        border: 4px solid #A87648;
        margin: 10px;
        object-fit: cover;
      }

      /* Laptop screens below 1440px */
      @media (max-width: 1440px) {
        .navbar-brand {
          font-size: 40px;
        }
        
        .nav-link {
          font-size: 24px;
          margin: 0 10px;
        }
        
        .right-navbar .nav-item {
          margin-right: 100px !important;
        }
        
        .collection-heading {
          font-size: 64px;
        }
        
        .new-coming {
          font-size: 32px;
          margin-top: 40px;
        }
        
        .image-card {
          width: 140px;
          height: 110px;
        }
        
        .btn-login, 
        .btn-register {
          padding: 10px 25px;
          font-size: 16px;
        }
      }
      
      /* Laptop screens below 1200px */
      @media (max-width: 1199.98px) {
        .navbar-brand {
          font-size: 36px;
        }
        
        .nav-link {
          font-size: 20px;
        }
        
        .right-navbar .nav-item {
          margin-right: 70px !important;
        }
        
        .collection-heading {
          font-size: 56px;
        }
        
        .new-coming {
          font-size: 28px;
        }
        
        .image-card {
          width: 120px;
          height: 95px;
        }

        .kotak-coklat {
          height: 100px;
        }
      }

      @media (max-width: 992px) {
        .navbar-brand {
          font-size: 2rem;
        }
        
        .collection-heading {
          font-size: 3rem;
        }
        
        .nav-link {
          font-size: 1rem;
          padding: 0.5rem;
        }
        
        .right-navbar .nav-item {
          margin-right: 0 !important;
        }
      }
      
      @media (max-width: 768px) {
        .navbar-brand {
          font-size: 1.75rem;
        }
        
        .new-coming {
          font-size: 1.5rem;
          margin-top: 1.5rem;
        }
        
        .collection-heading {
          font-size: 2.5rem;
          white-space: normal;
        }
        
        .content-wrapper {
          padding-left: 1rem;
          padding-right: 1rem;
        }
        
        .image-card {
          max-width: 120px;
          margin: 0.5rem auto;
        }
        
        .btn-custom {
          margin-top: 1.5rem;
          padding: 0.6rem 1.5rem;
        }
      }
      
      @media (max-width: 576px) {
        .collection-heading {
          font-size: 2rem;
        }
        
        .image-card {
          max-width: 100px;
        }
        
        .d-flex {
          flex-direction: column;
          gap: 0.75rem;
        }
        
        .btn-custom {
          width: 100%;
        }
      }
    </style>
    <title>Landing Page</title>
  </head>
  <body>
    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-2"> <!-- py-2 lebih kecil dari py-3 -->
      <div class="container">
        <a class="navbar-brand" href="#" style="color: #A87648;">MUAku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto right-navbar">
            <li class="nav-item" style="margin-right: 150px"> 
              <a class="nav-link text-black" href="#">Collection</a>
            </li>
            <li class="nav-item" style="margin-right: 150px">
              <a class="nav-link text-black" href="#">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-black" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    {{-- Body Content --}}
    <div class="content-wrapper">
      <div class="container">
        <div class="row align-items-center py-5">
          <div class="col-lg-6">
            <h1 class="new-coming">New Coming</h1>
            <p class="collection-heading">MUAku Collection</p>

            <div class="row mb-4">
              <div class="col-4">
                <img src="{{ asset('image/foto-cewek-1.jpg') }}" class="image-card" alt="Makeup Example 1">
              </div>
              <div class="col-4">
                <img src="{{ asset('image/foto-makeup.jpg') }}" class="image-card" alt="Makeup Example 2">
              </div>
              <div class="col-4">
                <img src="{{ asset('image/foto-cewek-2.jpg') }}" class="image-card" alt="Makeup Example 3">
              </div>
            </div>

            <div class="d-flex">
              <button type="button" class="btn btn-login me-3" data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</button>
              <button type="button" class="btn btn-register" data-bs-toggle="modal" data-bs-target="#registerModal">Sign Up</button>
            </div>

            {{-- Pop Up ketika tombol Sign In diklik --}}
            <div class="modal fade" id="loginModal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <p class="text-center fw-bold">Login as</p>
                    <button type="button" class="btn btn-login me-3">
                      <a href="{{ route('login') }}" class="text-decoration-none text-white">User</a>
                    </button>
                    <button type="button" class="btn btn-register">
                      <a href="{{ route('login-mua') }}" class="text-decoration-none text-black">MakeUp Artist</a>
                    </button>
                  </div>
                </div>
              </div>
            </div>

            {{-- Pop Up ketika tombol Sign Up diklik --}}
            <div class="modal fade" id="registerModal" tabindex="-1">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-body text-center">
                    <p class="text-center fw-bold">Register as</p>
                    <button type="button" class="btn btn-login me-3">
                      <a href="{{ route('register') }}" class="text-decoration-none text-white">User</a>
                    </button>
                    <button type="button" class="btn btn-register">
                      <a href="{{ route('register-mua') }}" class="text-decoration-none text-black">MakeUp Artist</a>
                    </button>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <div class="kotak-coklat" style="background-color: #332318; width: 100%; height: 50px; position: absolute; bottom: 0;"></div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
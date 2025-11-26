<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">
    <title>User ~ Dashboard</title>

    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <style>
      html, body {
        height: 100%;
        margin: 0;
      }
      body {
          min-height: 150vh;
          background: linear-gradient(#DFDBDC, #E6DBD9, #E4CFCE, #D3CEE5);
          background-attachment: fixed;
          display: flex;
          flex-direction: column;
        }

        main {
          flex: 1;
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

      .no-gap {
          --bs-gutter-x: 0;
          margin-right: calc(-0.5 * var(--bs-gutter-x));
          margin-left: calc(-0.5 * var(--bs-gutter-x));
      }
      .no-gap > [class^="col-"] {
          padding-right: calc(var(--bs-gutter-x) * 0.25);
          padding-left: calc(var(--bs-gutter-x) * 0.25);
      }

      .ribbon-img {
        max-height: 150px;
        width: auto;
      }

      @media (max-width: 768px) {
        .ribbon-img {
          max-height: 100px;
        }

        .logo-mua {
          width: 70px;
          height: 70px;
        }
      }
          </style>
  </head>
  <body>
    <main>
      
      <x-navbar/>

      <div class="position-relative text-center text-white" style="height: 300px; overflow: hidden;">
        <img src="{{ asset('image/alat-makeup.jpg') }}" 
            class="w-100 h-100 position-absolute top-0 start-0 logo-mua" 
            style="object-fit: cover; filter: blur(4px); z-index: 1;">

        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.3); z-index: 2;"></div>

        <div class="position-relative d-flex flex-column justify-content-center align-items-center h-100" style="z-index: 3;">
          <img src="{{ asset('image/MUAku-Icon.png') }}" style="width: 180px; height: 160px; object-fit:cover;"/>
          <h1 class="fw-bold">MUAku Collection</h1>
        </div>
      </div>

      @if (session('user-error'))
          <x-flash-message :message="session('user-error')" />
      @endif

     <form method="GET" action="{{ route('list-mua') }}">
        <div class="container mt-5">
            <h4 class="fw-bold mb-4 text-center">Make Up Category</h4>
            
            <div class="row align-items-center justify-content-center">
                <div class="col-md-2 text-center">
                    <img src="{{ asset('image/pita-kiri.png') }}" class="img-fluid ribbon-img" style="max-height: 350px; object-fit: cover;">
                </div>
                
                <div class="col-md-6">
                    <div class="row gx-2 mb-3 justify-content-center">
                        <x-category-button
                            value="Pesta dan Acara"
                            image="image/foto-cewek-2.jpg"
                            label="Pesta<br>dan Acara" 
                            :active="request('category') === 'Pesta dan Acara'" />
                        
                        <x-category-button
                            value="Pengantin"
                            image="image/foto-cewek-3.jpg"
                            label="Pengantin" 
                            :active="request('category') === 'Pengantin'" />
                        
                        <x-category-button
                            value="Editorial"
                            image="image/foto-cewek-4.jpg"
                            label="Editorial" 
                            :active="request('category') === 'Editorial'" />
                    </div>
                </div>
                
                <div class="col-md-2 text-center">
                    <img src="{{ asset('image/pita-kanan.png') }}" class="img-fluid ribbon-img" style="max-height: 350px; object-fit: cover;">
                </div>
            </div>
        </div>
    </form>

      {{-- List MUA --}}
      <h4 class="fw-bold mb-4 ms-3">MUA Party and Event Recommendation</h4>
      <div class="container-fluid px-0 mt-3">
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
                <x-artist-card :artist="$artistId" :blur="false" />
              @endforeach
            @endif
          @endif
        </div>
              {{-- Pagination --}}
      {{-- Pagination --}}
      <x-pagination :paginator="$artist" />
      </div>
    </main>

    <x-footer/>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const toastEl = document.querySelector('.toast');
        if (toastEl) {
          const toast = new bootstrap.Toast(toastEl, {delay: 3000});
          toast.show();
        }
      });
    </script>
  </body>
</html>
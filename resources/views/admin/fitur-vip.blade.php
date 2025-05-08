<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">
    <title>Data Pengguna Berlangganan</title>
    <style>
        body {
            min-height: 100vh;
            background-image: url('{{ asset('image/foto-makeup.jpg') }}');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            background-position: center 48%;
            font-family: 'DM Serif Display', sans-serif;
            font-weight: 400;
            font-style: normal;
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

        .navbar-nav .nav-link:hover i {
            color: #332318 !important;
        }

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

        li {
            margin-right: 1.5rem;
        }
        
        .card-body {
            min-height: 20px;
            display: flex;
            flex-direction: column;
        }
    </style>
  </head>
  <body>
    <div class="container mt-2 mb-3">
      <h1 class="text-center mb-4 mt-3">SETTINGS VIP FEATURE</h1>
    </div>

    <div>
        <main>
          <div class="row justify-content-center row-cols-2 row-cols-md-2 mb-3" style="margin-left: 55px; margin-right: 5px;">
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm" style="width: 654px; margin-right: 5px; height: 300px;">
                <div class="card-header py-3" style="background-color: #332318; color: #fff;">
                  <h5 class="my-0 fw-bold text-center">Tipe Paket Basic</h5>
                </div>
                <div class="card-body ms-start">
                  <p class="fw-normal">Tarif: (harga integer (50) di CRUD)</p> 
                  <p class="fw-normal">Deskripsi: (deskripsi varchard (500) bisa di CRUD)</p> 
                  <button type="button" class="btn btn-lg fw-bold" style="background: #6DE471;">Langganan</button>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm" style="width: 654px; margin-right: 5px; height: 300px;">
                <div class="card-header py-3" style="background-color: #332318; color: #fff;">
                  <h5 class="my-0 fw-bold text-center">Tipe Paket Basic</h5>
                </div>
                <div class="card-body ms-start">
                  <p class="fw-normal">Tarif: (harga integer (50) di CRUD)</p> 
                  <p class="fw-normal">Deskripsi: (deskripsi varchard (500) bisa di CRUD)</p> 
                  <button type="button" class="btn btn-lg fw-bold" style="background: #6DE471;">Langganan</button>
                </div>
              </div>
            </div>

            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm" style="width: 654px; margin-right: 5px; height: 300px;">
                <div class="card-header py-3" style="background-color: #332318; color: #fff;">
                  <h5 class="my-0 fw-bold text-center">Tipe Paket Basic</h5>
                </div>
                <div class="card-body ms-start">
                  <p class="fw-normal">Tarif: (harga integer (50) di CRUD)</p> 
                  <p class="fw-normal">Deskripsi: (deskripsi varchard (500) bisa di CRUD)</p> 
                  <button type="button" class="btn btn-lg fw-bold" style="background: #6DE471;">Langganan</button>
                </div>
              </div>
            </div>
        
          </div>
        </main>
      </div>


    <nav class="navbar fixed-bottom navbar-expand-sm" style="background-color: #332318; width: 340px; border-radius: 50px; margin-left: 40%; margin-bottom: 20px; padding: 5px 0;">
      <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
          <ul class="navbar-nav nav-brand" style="gap: 60px;">
            <li class="nav-item">
              <a class="nav-link fs-4" href="#"><i class="bi bi-person-fill-check"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4" aria-disabled="true"><i class="bi bi-pie-chart-fill"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4" href="#" aria-expanded="false"><i class="bi bi-gear-fill"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
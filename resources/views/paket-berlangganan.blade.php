<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Paket Langganan</title>
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(#F6F6F6, #EECFC0);
            background-attachment: fixed;
            margin: 0;
            padding: 0;
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
    </style>
  </head>
  <body>
    <div class="container py-3">
      <header class="d-flex align-items-center justify-content-center position-relative py-3">
        <!-- Tombol kembali (diposisikan absolute di kiri) -->
        <button type="button" 
                class="btn btn-light rounded-circle btn-outline-dark position-absolute start-0 ms-3">
            <i class="bi bi-arrow-left"></i>
        </button>
        
        <!-- Judul (ditengah secara natural) -->
        <div class="text-center">
            <h1 class="display-4 fw-normal m-0" style="font-family: 'DM Serif Display', serif; font-weight: 400;">
                PREMIUM
            </h1>
        </div>
    </header>
      
    <div>
        <main>
          <h1 style="font-family: 'DM Serif Display', serif;font-weight: 400;font-style: normal; margin-bottom: 20px; margin-top: 70px; margin-left: 70px">Content digital premium access</h1>
          <div class="row row-cols-1 row-cols-md-3 mb-3 text-center" style="margin-left: 55px; margin-right: 5px;">
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm" style="width: 88%; margin-right: 5px;">
                <div class="card-header py-3" style="background-color: #332318; color: #fff;">
                  <h5 class="my-0 fw-bold">PAKET DASAR</h5>
                  <h1 class="fw-bold">RP 4.000,-</h1>
                </div>
                <div class="card-body">
                  <ul class=" mt-3 mx-auto mb-4 text-start" style="padding-left: 0;">
                    <li>Akses peta interaktif</li>
                    <li>Data lebih lengkap & detail</li>
                    <li>Fitur chat</li>
                    <li>Berlangganan selama 1 hari</li>
                  </ul>
                  <button type="button" class="w-50 btn btn-lg fw-bold" style="background: #EECFC0; margin-left: 70px">Langganan</button>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm" style="width: 88%;">
                <div class="card-header py-3" style="background-color: #332318; color: #fff;">
                  <h5 class="my-0 fw-bold">PAKET MEDIUM</h5>
                  <h1 class="fw-bold">RP 13.000,-</h1>
                </div>
                <div class="card-body">
                  <ul class="mt-3 mx-auto mb-4 text-start" style="padding-left: 0;">
                    <li>Akses peta interaktif</li>
                    <li>Data lebih lengkap & detail</li>
                    <li>Fitur chat</li>
                    <li>Berlangganan selama 7 hari</li>
                  </ul>
                  <button type="button" class="w-50 btn btn-lg fw-bold" style="background: #EECFC0; margin-left: 70px">Langganan</button>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card mb-4 rounded-3 shadow-sm" style="width: 88%;">
                <div class="card-header py-3" style="background-color: #332318; color: #fff;">
                  <h5 class="my-0 fw-bold">PAKET HIGH</h5>
                  <h1 class="fw-bold">RP 150.000,-</h1>
                </div>
                <div class="card-body">
                  <ul class="mt-3 mx-auto mb-4 text-start" style="padding-left: 0;">
                    <li>Akses peta interaktif</li>
                    <li>Data lebih lengkap & detail</li>
                    <li>Fitur chat</li>
                    <li>Berlangganan selama 365 hari</li>
                  </ul>
                  <button type="button" class="w-50 btn btn-lg fw-bold" style="background: #EECFC0; margin-left: 70px">Langganan</button>
                </div>
              </div>
            </div>
          </div>
        </main>
      </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
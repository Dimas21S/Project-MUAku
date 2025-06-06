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
            font-family: 'Red Hat Display', sans-serif;
            color: #332318;
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
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        h1 {
            font-family: 'DM Serif Display', serif;
            color: #fff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            font-weight: 600;
        }
        
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        
        .card-header {
            border-radius: 12px 12px 0 0 !important;
            font-family: 'DM Serif Display', serif;
        }
        
        .btn-subscribe {
            background-color: #6DE471;
            color: #332318;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
            align-self: flex-end;
        }
        
        .btn-subscribe:hover {
            background-color: #5BC75F;
            transform: scale(1.05);
        }
        
        .btn-edit {
            background-color: #FFC107;
            color: #332318;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-edit:hover {
            background-color: #E0A800;
        }
        
        .package-price {
            font-size: 1.2rem;
            font-weight: 600;
            color: #332318;
        }
        
        .package-description {
            margin-bottom: 1rem;
        }
        
        .action-buttons {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: auto;
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 1.8rem;
            }
            
            .card {
                margin-bottom: 1.5rem;
            }
            
            .action-buttons {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .btn-subscribe, .btn-edit {
                width: 100%;
            }
        }
        
        @media (max-width: 576px) {
            h1 {
                font-size: 1.5rem;
            }
            
            .card-header h5 {
                font-size: 1rem;
            }
        }
    </style>
  </head>
  <body>
    <div class="container py-4">
      <h1 class="text-center mb-4">SETTINGS VIP FEATURE</h1>

      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        @foreach ($packages as $package)
          <div class="col">
            <div class="card h-100 shadow-sm">
              <div class="card-header py-3 text-center" style="background-color: #332318; color: #fff;">
                <h5 class="my-0 fw-bold">Paket: {{ $package->package_type }}</h5>
              </div>
              <div class="card-body">
                <p class="package-price">Rp {{ number_format($package->price, 0, ',', '.') }}</p>
                <p class="package-description">{{ $package->description }}</p>
                <div class="action-buttons">
                  <a href="{{ route('form-edit', $package->id) }}" class="btn btn-edit btn-sm">Edit</a>
                  <a href="#" class="btn btn-subscribe btn-lg fw-bold">Langganan</a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <x-navbar/>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
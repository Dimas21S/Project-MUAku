<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">
    <title>User Profile</title>
    <style>
        body {
            background: linear-gradient(#EECFC0, #F6F6F6);
            background-attachment: fixed;
            background-size: cover;
            min-height: 100vh;
            padding: 20px;
        }
        
        .profile-container {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            max-width: 1200px;
            margin: 50px auto;
        }
        
        .profile-info {
            width: 50%;
            padding-right: 50px;
        }
        
        .profile-image-container {
            width: 50%;
            text-align: right;
        }
        
        .profile-image {
            width: 400px;
            height: 400px;
            object-fit: cover;
            border-radius: 50%;
        }
        
        .info-label {
            color: #6c757d;
            font-weight: 500;
            margin-bottom: 5px;
        }
        
        .info-value {
            font-size: 1.1rem;
            padding-bottom: 8px;
            border-bottom: 1px solid #212529;
            margin-bottom: 25px;
        }
        
        .email-link {
            color: inherit;
            text-decoration: none;
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

        .btn-logout {
            background-color: #EECFC0;
            border: none;
            width: 100%;
            margin-top: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            background-color: #A87648;
            color: white;
        }
            
        @media (max-width: 992px) {
            .profile-container {
                flex-direction: column;
            }
            .profile-info,
            .profile-image-container {
                width: 100%;
                text-align: center;
                padding-right: 0;
            }
            .profile-image {
                margin-top: 30px;
                width: 300px;
                height: 300px;
            }
        }
    </style>
  </head>
  <body>
    <div class="profile-container">
        <!-- Keterangan Profil User -->
        <div class="profile-info">
            <div class="mb-4">
                <h5 class="info-label">USER NAME</h5>
                <p class="info-value">{{$user->name}}</p>
            </div>
            
            <div class="mb-4">
                <h5 class="info-label">E-MAIL</h5>
                <p class="info-value">{{$user->email}}</p>
            </div>
            
            <div class="mb-4">
                <h5 class="info-label">PASSWORD</h5>
                <p class="info-value">********</p>
            </div>
            
            <div class="mb-4">
                <h5 class="info-label">DESKRIPSI</h5>
                <p class="info-value">
                    aku seorang pelaut yang suka beraktifitas menggunakan make up, 
                    di bawah terik matahari di lautan lepas samudra.
                </p>
            </div>

            {{-- Tombol Logout --}}
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Keluar
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Profile Image Section (Right) -->
        <div class="profile-image-container">
            <img src="{{ asset('image/foto-cewek-5.jpg') }}" class="profile-image" alt="Profile Picture">
        </div>
    </div>

    {{-- Component Navbar Bottom (Bisa dilihat di folder components) --}}
    {{-- Navbar Bottom --}}
    <x-navbar></x-navbar>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
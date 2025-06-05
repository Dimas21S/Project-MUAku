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
            flex-wrap: wrap;
        }
        
        .profile-info {
            width: 50%;
            padding-right: 50px;
            order: 1;
        }
        
        .profile-image-container {
            width: 50%;
            text-align: right;
            position: relative;
            order: 2;
        }
        
        .profile-image {
            width: 400px;
            height: 400px;
            object-fit: cover;
            border-radius: 50%;
            border: 5px solid #EECFC0;
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

        .btn-logout {
            background-color: #EECFC0;
            border: none;
            width: 50%;
            margin-top: 10px;
            transition: all 0.3s ease;
        }
        
        .btn-logout:hover {
            background-color: #A87648;
            color: white;
        }
        
        /* Tombol edit di atas foto profil */
        .btn-edit-profile {
            position: absolute;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #A87648;
            color: white;
            border: 2px solid white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 2;
            transition: all 0.3s ease;
        }
        
        .btn-edit-profile:hover {
            background-color: #8a5d38;
            transform: scale(1.1);
        }

        /* Indikator aktif */
      .navbar-nav .nav-link.active::after {
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

      .navbar-nav .nav-link.active i {
          color: #332318 !important;
      }
            
        @media (max-width: 992px) {
            .profile-container {
                flex-direction: column;
                align-items: center;
            }

            .profile-image-container {
                width: 100%;
                text-align: center;
                order: 0; /* tampilkan di atas */
            }

            .profile-image {
                margin-top: 30px;
                width: 220px;
                height: 220px;
            }

            .btn-edit-profile {
                bottom: 20px;
                right: calc(50% - 25px);
            }

            .btn-logout {
                width: 80%;
                max-width: 200px;
                margin: 20px auto 0;
            }

            .profile-info {
                width: 100%;
                padding: 20px;
                text-align: center;
                order: 1;
            }
        }
    </style>
  </head>
  <body>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('password_success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('password_success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('user-error'))
          <x-toast :message="session('user-error')" />
         @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
     <div class="profile-container">

            <!-- Keterangan Profil User -->
            <div class="profile-info mt-5"> 
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
                    <button class="btn btn-primary" style="background-color: #A87648; border-radius: 10px;">
                        <a href="{{ route('update.password') }}" class="text-white text-decoration-none">Ubah Password</a>
                    </button>
                </div>
                
                <div class="mb-4">
                    <h5 class="info-label">DESKRIPSI</h5>
                    <p class="info-value">
                        @if($user->deskripsi)
                            {{$user->deskripsi}}
                        @else
                            Belum ada deskripsi.
                        @endif
                    </p>
                </div>
            </div>

            <!-- Profile Image Section (Right) -->
            <div class="profile-image-container">
                <div style="position: relative; display: inline-block;">
                    @if ($user->foto_profil)
                        <img src="{{ Storage::url($user->foto_profil) }}" class="profile-image" alt="Profile Picture">
                    @else
                        <img src="{{ asset('image/Profile-Foto.jpg') }}" class="profile-image" alt="Default Profile Picture">
                    @endif
                    
                    <!-- Tombol Edit Profil -->
                    <a href="{{ route('update') }}" class="btn-edit-profile" title="Edit Profil">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                </div>
                
                <!-- Tombol Logout -->
                <div style="margin-top: 20px; margin-right: 50px;">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-logout"style="background-color: #901818D9; border-radius: 10px;">
                            <i></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

    {{-- Component Navbar Bottom (Bisa dilihat di folder components) --}}
    {{-- Navbar Bottom --}}
    <x-navbar></x-navbar>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/toast.js') }}"></script>
  </body>
</html>
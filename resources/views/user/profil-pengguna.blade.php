<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>

    <!-- Bootstrap & Icon CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">

    <style>
      body {
        background: linear-gradient(to bottom, #E6DBD9, #6B4D34);
        background-attachment: fixed;
        background-size: cover;
        min-height: 100vh;
      }

      .profile-container {
        max-width: 1200px;
        margin: 50px auto;
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
        align-items: flex-start;
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

      .profile-image-container {
        position: relative;
        text-align: center;
      }

      .profile-image {
        width: 300px;
        height: 300px;
        object-fit: cover;
        border-radius: 50%;
        border: 5px solid #EECFC0;
      }

      .btn-edit-profile {
        position: absolute;
        bottom: 20px;
        right: 20px;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        background-color: #A87648;
        color: white;
        border: 2px solid white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .btn-edit-profile:hover {
        background-color: #8a5d38;
        transform: scale(1.1);
      }

      .profile-info {
        flex: 1 1 400px;
        color: #212529;
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

      .btn-logout {
        background-color: #901818D9;
        color: white;
        border-radius: 10px;
        width: 100%;
        max-width: 200px;
        margin-top: 10px;
        transition: all 0.3s ease;
      }

      .btn-logout:hover {
        background-color: #6d1010;
      }

      @media (max-width: 768px) {
        .profile-image {
          width: 200px;
          height: 200px;
        }

        .btn-edit-profile {
          right: calc(50% - 25px);
        }

        .profile-info {
          text-align: center;
        }
      }
    </style>
  </head>
  <body>

    {{-- Alert Messages --}}
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if (session('password_success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('password_success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if (session('user-error'))
      <x-toast :message="session('user-error')" />
    @endif

    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

        {{-- Navbar --}}
      <x-navbar/>

    <div class="profile-container">
        <div class="container py-4 border border-dark mt-3" style="background-color: white;">
    <div class="row">
    
    <!-- Kolom Foto Profil - Kiri -->
    <div class="col-md-4 text-center mb-4">
      <div class="profile-image-container">
        @if ($user->foto_profil)
          <img src="{{ Storage::url($user->foto_profil) }}" class="profile-image" alt="Profile Picture">
        @else
          <img src="{{ asset('image/Profile-Foto.jpg') }}" class="profile-image" alt="Default Profile Picture">
        @endif

        <!-- Tombol Edit Foto -->
        <a href="{{ route('update') }}" class="btn-edit-profile" title="Edit Profil">
          <i class="bi bi-pencil-fill"></i>
        </a>
      </div>
    </div>

    <!-- Kolom Biodata - Kanan -->
    <div class="col-md-8">
      <div class="profile-info">
        <div class="mb-4">
          <h1 class="info-label">{{ $user->name }}</h5>
        </div>

        <div class="mb-4">
          <h6 class="info-label">E-MAIL</h5>
          <p class="info-value">{{ $user->email }}</p>
        </div>

        <div class="mb-4">
          <h6 class="info-label">PASSWORD</h5>
          <p class="info-value">********</p>
        </div>

        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-logout">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </button>
        </form>
        <a href="{{ route('update.password') }}" class="btn btn-sm text-white" style="background-color: #A87648; border-radius: 10px;">Ubah Password</a>
      </div>
    </div>

  </div>
</div>

    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/toast.js') }}"></script>
  </body>
</html>

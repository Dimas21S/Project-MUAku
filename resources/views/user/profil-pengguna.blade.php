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
      html, body {
        height: 100%;
        margin: 0;
        display: flex;
        flex-direction: column;
      }
      main {
        flex: 1 0 auto;
      }
      body {
        background: linear-gradient(to bottom, #E6DBD9, #6B4D34);
        background-attachment: fixed;
        background-size: cover;
        min-height: 100vh;
      }

      .profile-container {
        width: 100%;
        max-width: 1200px;
        margin: 50px auto;
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
        padding: 1rem;
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

      .custom-modal {
          border-radius: 20px;
          box-shadow: 0 0 10px rgba(0,0,0,0.15);
      }

      .icon-container {
          width: 80px;
          height: 80px;
          background-color: #e63946;
          border-radius: 50%;
          display: flex;
          align-items: center;
          justify-content: center;
      }

      .exclamation-icon {
          color: white;
          font-size: 40px;
          font-weight: bold;
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
    <x-modal-success :message="session('success')" />
    @endif

    @if (session('user-error'))
      <x-flash-message :message="session('user-error')" />
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

          <button type="submit" class="btn btn-logout" data-bs-toggle="modal" data-bs-target="#customLogoutModal">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </button>
        <a href="{{ route('update') }}" class="btn btn-sm text-white" style="background-color: #A87648; border-radius: 10px;">Edit Profil</a>
      </div>
    </div>

      <!-- Modal Logout -->
      <x-modal-logout/>

      </div>
    </div>

    </div>

    <x-footer/>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function confirmLogout(event) {
        event.preventDefault();
        if (confirm('Apakah Anda yakin ingin logout?')) {
            document.getElementById('logout-form').submit();
        }
    }
  </script>
  </body>
</html>

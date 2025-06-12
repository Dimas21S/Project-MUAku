<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    
    {{-- Bootstrap CSS --}}
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
        }
        .table-container {
            background-color: white;
            opacity: 3;
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            border-radius: 10px;
        }

        /* Garis vertikal antar kolom */
        .table-container th:not(:last-child),
        .table-container td:not(:last-child) {
            border-right: 1px solid black;
        }

        .table-container th {
            background-color: white; /* Warna background header */
            border-bottom: 2px solid #dee2e6; /* Border lebih tebal di header */
        }

        .table-container table tbody tr td {
            border-top: none !important;
            border-bottom: none !important;
            padding: 6px;
        }

          /* Garis vertikal antar kolom */
        .table-container th:not(:last-child),
        .table-container td:not(:last-child) {
            border-right: 1px solid black;
        }
        
          /* Hapus semua border horizontal */
        .table-container table tbody tr td,
        .table-container table tbody tr th {
            border-top: none !important;
            border-bottom: none !important;
        }
        
          /* Border hanya untuk header */
        .table-container thead tr {
            border-bottom: 2px solid #dee2e6 !important;
        }
        
          /* Pastikan tidak ada border collapse yang bertabrakan */
        .table-container table {
            border-collapse: separate;
            border-spacing: 0;
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
    </style>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-white py-2"> <!-- py-2 lebih kecil dari py-3 -->
        <div class="container">
          <a class="navbar-brand" href="#"><img src="{{ asset('image/MUAku-Icon-2.jpg.png') }}" style="width: 130px; height: 60px; object-fit:cover;"/></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto right-navbar">
              <li class="nav-item" style="margin-right: 100px"> 
                <a class="nav-link text-black" href="{{ route('verified-admin') }}">GlamGate</a>
              </li>
              <li class="nav-item" style="margin-right: 100px">
                <a class="nav-link text-black" href="{{ route('data-pelanggan') }}">ClientSphere</a>
              </li>
              <li class="nav-item" style="margin-right: 100px">
                <a class="nav-link text-black" href="{{ route('vip-fitur') }}">PayFlow</a>
              </li>
              <button type="submit" class="btn btn-logout" data-bs-toggle="modal" data-bs-target="#customLogoutModal">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
          </button>
            </ul>
          </div>
        </div>
      </nav>

    <div class="container mt-2 mb-3">
      <h1 class="text-center mb-4 mt-3">DATA OF ORANG BERLANGGANAN</h1>
    </div>

    {{-- Daftar User --}}
    <div class="table-container" style="overflow-x:auto;">
      <table class="table border-top-0 border-bottom-0 table-hover">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col" class="text-center">MUA User Akun</th>
              <th scope="col" class="text-center">Type of Berlangganan</th>
              <th scope="col" class="text-center">Times</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($itemPembayaran as $pembayaran)              
            <tr>
              <th scope="row">{{ $pembayaran->id }}</th>
              <td>{{ $pembayaran->user->name }}</td>
              <td>{{ $pembayaran->package_name }}</td>
              <td>{{ $pembayaran->created_at }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>

      <!-- Modal Logout -->
      <x-modal-logout/>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
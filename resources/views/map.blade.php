<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Peta Kampus</title>

  <!-- Bootstrap & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

  <style>
    html, body {
      height: 100%;
      margin: 0;
      padding: 0;
      background: linear-gradient(#EECFC0, #F6F6F6);
      background-attachment: fixed;
      background-size: cover;
    }

    #map {
      height: 80vh;
      width: 100%;
      border-radius: 10px;
    }

    .navbar-nav .nav-link {
      color: #EECFC0 !important;
      width: 40px;
      height: 40px;
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      transition: all 0.3s ease;
    }

    .navbar-nav .nav-link:hover::before {
      content: '';
      position: absolute;
      width: 40px;
      height: 40px;
      background: white;
      border-radius: 50%;
      z-index: -1;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
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

    .search-box {
      position: relative;
      max-width: 500px;
    }

    .search-box input {
      padding-left: 2.5rem;
      border-radius: 5px;
    }

    .search-box i {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
    }
  </style>
</head>
<body>

  <div class="container mt-4">
    <h3 class="mb-3">Pencarian Make Up Artist</h3>
    <div class="search-box">
      <input id="autocomplete" class="form-control border border-dark" type="text" placeholder="Cari lokasi...">
      <i class="bi bi-search"></i>
    </div>
  </div>

  <div id="map" class="container mt-3"></div>

  <nav class="navbar fixed-bottom navbar-expand-sm" style="background-color: #332318; border-radius: 50px; max-width: 530px; margin: 20px auto; padding: 5px 0;">
    <div class="container-fluid justify-content-center">
      <ul class="navbar-nav d-flex flex-row gap-4">
        <li class="nav-item"><a class="nav-link fs-4" href="#"><i class="bi bi-house"></i></a></li>
        <li class="nav-item"><a class="nav-link fs-4" href="#"><i class="bi bi-geo-alt-fill"></i></a></li>
        <li class="nav-item"><a class="nav-link fs-4" href="#"><i class="bi bi-heart"></i></a></li>
        <li class="nav-item"><a class="nav-link fs-4" href="#"><i class="bi bi-card-text"></i></a></li>
        <li class="nav-item"><a class="nav-link fs-4" href="#"><i class="bi bi-person-fill"></i></a></li>
      </ul>
    </div>
  </nav>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <script>
    const map = L.map('map').setView([0, 0], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; OpenStreetMap contributors'
    }).addTo(map);

    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function (position) {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;

        map.setView([lat, lon], 18);

        const marker = L.marker([lat, lon]).addTo(map);
        marker.bindPopup("<strong>Lokasi kamu sekarang</strong>").openPopup();
      }, function (error) {
        alert("Gagal mengambil lokasi: " + error.message);
      });
    } else {
      alert("Geolocation tidak didukung di browser ini.");
    }
  </script>
</body>
</html>

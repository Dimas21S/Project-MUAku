<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">

    <title>Hello, world!</title>
    <style>
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
      </style>
  </head>
  <body>
    @if($history && count($history) > 0)
        <div class="container-fluid px-0 mt-5 mb-3">
        <h4 class="fw-bold mb-4 ms-3">Riwayat MUA yang Pernah Dilihat</h4>
        <div class="row mx-0 mb-3 row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 g-7">
            @foreach($history as $item)
            <div class="col mb-4">
                <div class="card border border-dark px-1 py-1 shadow-sm h-100" style="background: transparent;">
                <img src="{{ asset($item->makeupartist->profile_photo ?? 'image/Profile-Foto.jpg') }}" class="card-img-top" alt="MUA" style="height: 200px; object-fit: cover;">
                <div class="card-body p-2" style="background: #F0F0F0;">
                    <p class="card-text small fw-normal mb-1 text-truncate">Kategori: {{ $item->makeupartist->category }}</p>
                    <p class="card-text small fw-normal mb-1 text-truncate">Alamat: {{ $item->makeupartist->address->city }}</p>
                    <a href="/deskripsi-mua/{{ $item->makeupartist->id }}" class="btn btn-outline-dark btn-sm w-100">Lihat Profil</a>
                </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    @endif

    <form action="{{ route('delete.history') }}" method="POST" class="mb-3 ms-3">
  @csrf
  <button type="submit" class="btn btn-outline-danger btn-sm">Hapus Semua Riwayat</button>
</form>

<x-navbar></x-navbar>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
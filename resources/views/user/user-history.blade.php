<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat & Favorit MUA</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.12.1/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary-color: #5E3023;
            --secondary-color: #EECFC0;
            --accent-color: #D9B8A8;
            --text-dark: #332318;
            --text-light: #F8F1EE;
            --bg-light: #F9F5F3;
        }
        
        body {
                min-height: 100vh;
            background: linear-gradient(#DFDBDC, #E6DBD9, #E4CFCE, #D3CEE5);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
        
        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 25px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 50px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .mua-card {
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
            background: white;
            height: 100%;
        }
        
        .mua-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .mua-img {
            height: 220px;
            object-fit: cover;
            width: 100%;
        }
        
        .card-body {
            padding: 15px;
            background: white;
        }
        
        .card-text {
            color: var(--text-dark);
            margin-bottom: 8px;
            font-size: 0.9rem;
        }
        
        .btn-view {
            background-color: var(--primary-color);
            color: white;
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }
        
        .btn-view:hover {
            background-color: var(--text-dark);
            color: white;
        }
        
        .btn-clear {
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            border-radius: 8px;
            padding: 6px 12px;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }
        
        .btn-clear:hover {
            background-color: var(--primary-color);
            color: white;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        
        .empty-state i {
            font-size: 3rem;
            color: var(--accent-color);
            margin-bottom: 15px;
        }
        
        .empty-state p {
            color: var(--text-dark);
            font-size: 1.1rem;
        }
    </style>
</head>
<body>

    {{-- Navbar --}}
    <x-navbar/>

    <div class="container py-4 border border-dark mt-3" style="background-color: var(--bg-light);">
        <!-- Favorit -->
        <div class="mb-5">
            <h4 class="section-title">Favourite</h4>

            @if ($likedArtists && count($likedArtists) > 0)
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">
                    @foreach($likedArtists as $artist)
                    <x-artist-card :artist="$artist" :blur="false"/>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <i class="bi bi-heart"></i>
                    <p>Tidak ada MUA yang disukai.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
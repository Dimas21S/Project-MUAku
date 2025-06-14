<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Lexend:wght@100..900&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>About Us</title>
    <style>
      body {
        background: linear-gradient(#BBB4D6, #403879, #231D4F);
        min-height: 100vh;
      }

      .navbar-brand {
        font-family: 'DM Serif Display', serif;
        font-weight: 400;
        font-style: normal;
        color: #A87648;
        font-size: 48px;
        margin-left: 12px; /* Added to match container padding */
      }
      
      .nav-link {
        font-weight: 500;
        margin: 0 15px;
        font-family: 'Inter', sans-serif;
        font-size: 29px;
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

      .navbar-custom{
        background: linear-gradient(to left, #DFDBDC, #E6DBD9, #E4CFCE, #DCBFD3);
      }
      
      .content-text {
        font-family: 'Lexend', sans-serif;
        color: white;
        font-size: 1.1rem;
        line-height: 1.8;
      }
      
      .about-image {
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        max-height: 400px;
        margin-left:100px;
        object-fit: cover;
        width: auto;
        height: 90%;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light py-2 navbar-custom">
      <a href="{{ route('landing-page') }}" class="btn btn-light rounded-circle btn-outline-dark position-absolute start-0 ms-3">
        <i class="bi bi-arrow-left"></i>
      </a>
      <div class="container">
        <a class="navbar-brand" href="{{ route('landing-page') }}" style="color: #A87648;">MUAku</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
      </div>
    </nav>

    <div class="position-relative text-center text-white" style="height: 300px; overflow: hidden;">
        <img src="{{ asset('image/alat-makeup.jpg') }}" 
            class="w-100 h-100 position-absolute top-0 start-0" 
            style="object-fit: cover; filter: blur(4px); z-index: 1; width: auto; height: 50px;">

        <div class="position-absolute top-0 start-0 w-100 h-100" style="background-color: rgba(0, 0, 0, 0.3); z-index: 2;"></div>

        <div class="position-relative d-flex flex-column justify-content-center align-items-center h-100" style="z-index: 3;">
          <h1 class="fw-bold" style="font-family:DM Serif Display, serif; font-weight: 400; font-style: normal; font-size: 100px;">About Us</h1>
        </div>
    </div>

    <div class="container py-5">
        <div class="row align-items-center border border-dark" style="background:linear-gradient( #403879, #231D4F); border-radius:15px;">
            <!-- Image Column (Left) -->
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="{{ asset('image/Black-mamba-girl.jpg') }}" alt="About MUAku" class="about-image" style="box-shadow: -10px -10px 1px rgba(251, 248, 248, 0.93); ">
            </div>
            
            <!-- Text Column (Right) -->
            <div class="col-md-6">
                <div class="content-text">
                    <p class="mt-3 small">
                        MUAku adalah platform yang menghadirkan kreativitas dan keahlian dari para makeup artist berbakat. Kami percaya bahwa setiap sentuhan kuas memiliki makna, menciptakan tampilan yang tidak hanya memperindah 
                        tetapi juga mencerminkan kepribadian dan keunikan seseorang. 
                    </p>
                    <p class="small">
                        Di MUAku, kami menghubungkan para MUA profesional dengan mereka yang ingin tampil memukau, baik untuk acara spesial, sesi pemotretan, atau sekadar mempercantik tampilan sehari-hari. 
                    </p>
                    <p class="small">
                        Selain menjadi wadah untuk menampilkan hasil riasan terbaik, 
                        MUAku juga menjadi sumber inspirasi dengan tren kecantikan terkini serta berbagai tips makeup. 
                        Kami hadir untuk membantu setiap individu mengekspresikan dirinya melalui seni rias wajah, memastikan mereka merasa percaya diri dan bersinar di setiap momen. 
                    </p>
                    <p>
                        Jelajahi dunia kecantikan bersama MUAku dan temukan gaya terbaik untukmu!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
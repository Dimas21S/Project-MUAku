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

    <title>Contact Page</title>
    <style>
        body {
          background: linear-gradient(#BBB4D6, #403879, #231D4F);
          min-height: 200vh;
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

        .btn-purple {
        background-color: #6F679C;
        color: white;
      }
      .btn-purple:hover {
        background-color: #5a5182;
        color: white;
      }
      .form-section {
        border-radius: 10px;
        overflow: hidden;
        min-height: 100%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .contact-info {
        background-color: #6F679C;
        color: white;
        min-height: 100%;
        padding: 30px;
      }
      .contact-form {
        padding: 30px;
      }
      .circle-decoration {
        position: relative;
        height: 100px;
        margin-top: 40px;
      }
      .circle-decoration .circle1 {
        width: 150px;
        height: 150px;
        background-color: #fff;
        opacity: 0.3;
        border-radius: 50%;
        position: absolute;
        left: 80%;
        bottom: 20%;
      }
      .circle-decoration .circle2 {
        width: 80px;
        height: 80px;
        background-color: #000;
        opacity: 0.3;
        border-radius: 50%;
        position: absolute;
        right: 12%;
        bottom: 100%;
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
          <h1 class="fw-bold" style="font-family:DM Serif Display, serif; font-weight: 400; font-style: normal; font-size: 100px;">Contact</h1>
        </div>
    </div>

<div class="container my-5 border border-dark rounded" style="height: 90vh;">
  <div class="row form-section bg-white d-flex" style="min-height: 100%;">
    
    <!-- Contact Info Section -->
    <div class="col-md-5 contact-info d-flex flex-column justify-content-between my-2 mx-2" style="border-radius: 20px">
      <div>
        <h4 class="fw-bold">Contact Information</h4>
        <p>Say something to start a live chat!</p>
        <div class="mb-3 mt-4 d-flex align-items-center"><i class="icon bi bi-telephone me-2"></i> +62 8123 4567 89</div>
        <div class="mb-3 d-flex align-items-center"><i class="icon bi bi-envelope me-2"></i> muaku@gmail.com</div>
        <div class="d-flex align-items-center"><i class="icon bi bi-geo-alt me-2"></i> Kota Jambi</div>
      </div>
      <div class="circle-decoration">
        <div class="circle1"></div>
        <div class="circle2"></div>
      </div>
    </div>

    <!-- Form Section -->
    <div class="col-md-6 contact-form">
      <form>
        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Nama Depan</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama Depan">
          </div>
          <div class="col">
            <label class="form-label">Nama Belakang</label>
            <input type="text" class="form-control" placeholder="Masukkan Nama Belakang">
          </div>
        </div>

        <div class="row mb-3">
          <div class="col">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" placeholder="Masukkan Email">
          </div>
          <div class="col">
            <label class="form-label">Phone Number</label>
            <input type="tel" class="form-control" value="+62">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label d-block">Select Subject?</label>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="subject" id="layanan" checked>
            <label class="form-check-label" for="layanan">Layanan</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="subject" id="bantuan">
            <label class="form-check-label" for="bantuan">Bantuan & Dukungan</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="subject" id="saran">
            <label class="form-check-label" for="saran">Saran & Masukan</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="subject" id="lainnya">
            <label class="form-check-label" for="lainnya">Lainnya</label>
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label">Message</label>
          <textarea class="form-control" rows="4" placeholder="Masukkan Pesan"></textarea>
        </div>

        <div>
          <button type="submit" class="btn btn-purple px-4">Send Message</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>